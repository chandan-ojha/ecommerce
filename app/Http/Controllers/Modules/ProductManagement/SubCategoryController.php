<?php
namespace App\Http\Controllers\Modules\ProductManagement;

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
        $sub_categories = SubCategory::with('category:id,title')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $categories = Category::select('id', 'title')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Modules/ProductManagement/SubCategory/Index', [
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

            SubCategory::create([
                'category_id' => $request->category_id,
                'title'       => $request->title,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Sub Category created successfully!');

        } catch (Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to create Sub Category: ' . $e->getMessage());
        }
    }

    /**
     * Delete a SubCategory.
     */
    public function destroy($id)
    {
        try {
            $sub_category = SubCategory::findOrFail($id);

            $sub_category->delete();

            return redirect()->back()->with('success', 'Sub Category deleted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Sub Category: ' . $e->getMessage());
        }
    }
}
