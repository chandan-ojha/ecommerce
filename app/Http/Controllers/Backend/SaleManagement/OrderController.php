<?php
namespace App\Http\Controllers\Backend\SaleManagement;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Inertia\Inertia;

class OrderController extends Controller
{
    /**
     * Display the order page.
     */
    public function index()
    {
        $orders = Order::with([
            'user:id,name,email',
            'user_address:id,user_id,phone,region,city,area,address',
            'order_items.product:id,title,price',
        ])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        // return response()->json(['data' => $orders]);

        return Inertia::render('Backend/Modules/SaleManagement/Order/Index', [
            'title'  => 'Order List',
            'orders' => $orders,
        ]);
    }

}
