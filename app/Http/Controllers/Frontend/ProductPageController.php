<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProductPageController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/Pages/Product', [
            'title' => 'Product',
        ]);
    }
}
