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

        return Inertia::render('Backend/ProductManagement/Product/Index', [
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
            'quantity'        => 'nullable|integer|min:0',
            'price'           => 'required|numeric|min:0',
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

            Product::create([
                'category_id'     => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'title'           => $request->title,
                'quantity'        => $request->quantity ?? 0,
                'price'           => $request->price,
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
