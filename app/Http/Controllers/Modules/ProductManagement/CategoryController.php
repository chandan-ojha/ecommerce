<?php
namespace App\Http\Controllers\Modules\ProductManagement;

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
        $categories = Category::select('id', 'title', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return Inertia::render('Modules/ProductManagement/Category/Index', [
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

            Category::create([
                'title'       => $request->title,
                'description' => $request->description,
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

            $category->delete();

            return redirect()->back()->with('success', 'Category deleted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Category: ' . $e->getMessage());
        }
    }
}
