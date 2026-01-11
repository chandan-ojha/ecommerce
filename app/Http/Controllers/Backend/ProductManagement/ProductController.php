<?php
namespace App\Http\Controllers\Backend\ProductManagement;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display the product management page.
     */
    public function index()
    {
        $products = Product::with([
            'category:id,title',
            'subCategory:id,title',
            'media:id,name,file_name,mime_type,extension,disk,directory',
        ])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $categories = Category::with('subCategories:id,title,category_id')
            ->select('id', 'title')
            ->get();

        //return response()->json(['data' => $categories]);

        return Inertia::render('Backend/Modules/ProductManagement/Product/Index', [
            'title'      => 'Product Setup',
            'products'   => $products,
            'categories' => $categories,

        ]);
    }

    /**
     * Handle the project setup form submission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'     => 'required',
            'sub_category_id' => 'nullable',
            'title'           => 'required',
            'prod_code'       => 'nullable',
            'quantity'        => 'nullable|integer|min:0',
            'purchase_price'  => 'required',
            'tp_vat'          => 'nullable',
            'product_cost'    => 'nullable',
            'total_cost'      => 'nullable',
            'revenue'         => 'nullable',
            'selling_price'   => 'required',
            'description'     => 'nullable',
            'media_id'        => 'nullable|integer',
        ], [
            'category_id.required' => 'Select a category.',
            'title.required'       => 'Product title is required.',
        ]
        );

        try {
            DB::beginTransaction();

            $mediaId = null;

            // Handle media upload if present
            if ($request->hasFile('media')) {
                $media   = uploadMedia($request->file('media'), directory: 'uploads/products');
                $mediaId = $media->id;
            }

            // Auto-calculated fields
            // $purchasePrice = $request->purchase_price;
            // $tp_vat        = $request->tp_vat ?? 0;
            // $productCost   = $purchasePrice + ($purchasePrice * ($tp_vat / 100));
            // $totalCost     = $productCost * ($request->quantity ?? 1);
            // $revenue       = $request->revenue ?? 0;
            // $sellingPrice  = $productCost + ($productCost * ($revenue / 100));

            Product::create([
                'category_id'     => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'title'           => $request->title,
                'prod_code'       => $request->prod_code,
                'quantity'        => $request->quantity ?? 0,
                'purchase_price'  => $request->purchase_price,
                'tp_vat'          => $request->tp_vat ?? 0,
                'product_cost'    => $request->product_cost ?? 0,
                'total_cost'      => $request->total_cost ?? 0,
                'revenue'         => $request->revenue ?? 0,
                'selling_price'   => $request->selling_price,
                'description'     => $request->description,
                'media_id'        => $mediaId,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Product created successfully!');

        } catch (Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to create Product: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing product.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'     => 'required',
            'sub_category_id' => 'nullable',
            'title'           => 'required',
            'prod_code'       => 'nullable',
            'quantity'        => 'nullable|integer|min:0',
            'purchase_price'  => 'required',
            'tp_vat'          => 'nullable',
            'product_cost'    => 'nullable',
            'total_cost'      => 'nullable',
            'revenue'         => 'nullable',
            'selling_price'   => 'required',
            'description'     => 'nullable',
            'media_id'        => 'nullable|integer',
        ], [
            'category_id.required' => 'Select a category.',
            'title.required'       => 'Product title is required.',
        ]);

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $mediaId = $product->media_id;

            if ($request->hasFile('media')) {
                if ($mediaId) {
                    deleteMedia($mediaId);
                }
                // Upload new media
                $media   = uploadMedia($request->file('media'), directory: 'uploads/products');
                $mediaId = $media->id;
            }

            // Update product details
            $product->update([
                'category_id'     => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'title'           => $request->title,
                'prod_code'       => $request->prod_code,
                'quantity'        => $request->quantity ?? 0,
                'purchase_price'  => $request->purchase_price,
                'tp_vat'          => $request->tp_vat ?? 0,
                'product_cost'    => $request->product_cost ?? 0,
                'total_cost'      => $request->total_cost ?? 0,
                'revenue'         => $request->revenue ?? 0,
                'selling_price'   => $request->selling_price,
                'description'     => $request->description,
                'media_id'        => $mediaId,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Product updated successfully!');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update Product: ' . $e->getMessage());
        }
    }

    /**
     * Delete a product.
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            // Delete associated media if exists
            if ($product->media_id) {
                deleteMedia($product->media_id);
            }

            $product->delete();

            return redirect()->back()->with('success', 'Product deleted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Product: ' . $e->getMessage());
        }
    }

}
