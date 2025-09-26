<?php
namespace App\Http\Controllers\Backend\ProductManagement;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display the Category List Page
     */
    public function index()
    {
        $categories = Category::with([
            'media:id,name,file_name,mime_type,extension,disk,directory',
        ])
            ->select('id', 'title', 'created_at', 'media_id')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return Inertia::render('Backend/Modules/ProductManagement/Category/Index', [
            'title'      => 'Category Setup',
            'categories' => $categories,

        ]);
    }

    /**
     * Handle the Category setup form submission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            $mediaId = null;

            // Handle media upload if present
            if ($request->hasFile('media')) {
                $media   = uploadMedia($request->file('media'), directory: 'uploads/categories');
                $mediaId = $media->id;
            }

            Category::create([
                'title'       => $request->title,
                'description' => $request->description,
                'media_id'    => $mediaId,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Category created successfully!');

        } catch (Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to create Category: ' . $e->getMessage());
        }
    }

    /**
     * Delete a Category.
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);

            // Delete associated media if exists
            if ($category->media_id) {
                deleteMedia($category->media_id);
            }

            $category->delete();

            return redirect()->back()->with('success', 'Category deleted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Category: ' . $e->getMessage());
        }
    }
}
