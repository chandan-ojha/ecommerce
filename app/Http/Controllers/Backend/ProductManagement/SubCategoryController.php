<?php
namespace App\Http\Controllers\Backend\ProductManagement;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SubCategoryController extends Controller
{
    /**
     * Display the SubCategory List Page
     */
    public function index()
    {
        $sub_categories = SubCategory::with([
            'category:id,title',
            'media:id,name,file_name,mime_type,extension,disk,directory',
        ])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $categories = Category::select('id', 'title')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Backend/Modules/ProductManagement/SubCategory/Index', [
            'title'          => 'Sub Category Setup',
            'sub_categories' => $sub_categories,
            'categories'     => $categories,

        ]);
    }

    /**
     * Handle the SubCategory setup form submission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title'       => 'required',
        ], [
            'category_id.required' => 'Select a category.',
        ]
        );

        try {
            DB::beginTransaction();

            $mediaId = null;

            // Handle media upload if present
            if ($request->hasFile('media')) {
                $media   = uploadMedia($request->file('media'), directory: 'uploads/sub_categories');
                $mediaId = $media->id;
            }

            SubCategory::create([
                'category_id' => $request->category_id,
                'title'       => $request->title,
                'media_id'    => $mediaId,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Sub Category created successfully!');

        } catch (Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to create Sub Category: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing SubCategory.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title'       => 'required',
        ], [
            'category_id.required' => 'Select a category.',
        ]
        );

        try {
            DB::beginTransaction();

            $subCategory = SubCategory::findOrFail($id);

            $mediaId = $subCategory->media_id;

            // Handle media upload if present
            if ($request->hasFile('media')) {
                if ($mediaId) {
                    deleteMedia($mediaId);
                }
                // Upload new media
                $media   = uploadMedia($request->file('media'), directory: 'uploads/sub_categories');
                $mediaId = $media->id;
            }

            $subCategory->update([
                'category_id' => $request->category_id,
                'title'       => $request->title,
                'media_id'    => $mediaId,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Sub Category updated successfully!');

        } catch (Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to update Sub Category: ' . $e->getMessage());
        }
    }

    /**
     * Delete a SubCategory.
     */
    public function destroy($id)
    {
        try {
            $sub_category = SubCategory::findOrFail($id);

            // Delete associated media if exists
            if ($sub_category->media_id) {
                deleteMedia($sub_category->media_id);
            }

            $sub_category->delete();

            return redirect()->back()->with('success', 'Sub Category deleted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Sub Category: ' . $e->getMessage());
        }
    }

}
