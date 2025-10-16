<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with([
            'media:id,name,file_name,mime_type,extension,disk,directory',
        ])
            ->select('id', 'title', 'created_at', 'media_id')
            ->orderBy('created_at', 'desc')
            ->get();

        $onSaleProducts = Product::with([
            'media:id,name,file_name,mime_type,extension,disk,directory',
        ])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $products = Product::with([
            'media:id,name,file_name,mime_type,extension,disk,directory',
        ])
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // return response()->json(['data' => $categories]);

        return Inertia::render('Frontend/Pages/Home', [
            'title'          => 'Home',
            'categories'     => $categories,
            'products'       => $products,
            'onSaleProducts' => $onSaleProducts,
        ])->rootView('app');
    }
}
