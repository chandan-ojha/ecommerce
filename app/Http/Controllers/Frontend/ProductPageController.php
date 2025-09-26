<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Inertia\Inertia;

class ProductPageController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'media:id,name,file_name,mime_type,extension,disk,directory',
        ])
            ->orderBy('created_at', 'desc')
            ->get();

        // return response()->json(['data' => $products]);

        return Inertia::render('Frontend/Pages/Product', [
            'title'    => 'Product',
            'products' => $products,
        ]);
    }
}
