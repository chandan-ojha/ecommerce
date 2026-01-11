<?php
namespace App\Http\Controllers\Backend\SaleManagement;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'order_items.product:id,title,selling_price',
        ])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        // return response()->json(['data' => $orders]);

        return Inertia::render('Backend/Modules/SaleManagement/Order/Index', [
            'title'  => 'Order List',
            'orders' => $orders,
        ]);
    }

    /**
     * Update payment status of an order.
     */
    public function updatePaymentStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required|in:unpaid,paid,refunded',
        ]);

        try {
            $order = Order::findOrFail($id);

            $order->update([
                'payment_status' => $request->payment_status,
            ]);

            return redirect()->back()->with('success', 'Payment status updated successfully.');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update payment status: ' . $e->getMessage());
        }
    }

    /**
     * Update order status of an order.
     */
    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        try {
            $order = Order::findOrFail($id);

            $order->update([
                'order_status' => $request->order_status,
            ]);

            return redirect()->back()->with('success', 'Order status updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update order status: ' . $e->getMessage());
        }
    }

    /**
     * Download invoice.
     */
    public function downloadInvoiceOld($id)
    {
        try {
            $order = Order::with(['user', 'user_address', 'order_items.product'])->findOrFail($id);

            $pdf = Pdf::loadView('download.invoice', compact('order'))
                ->setPaper('a4', 'portrait');

            return $pdf->download("invoice_{$order->order_no}.pdf");

        } catch (Exception $e) {
            return back()->with('error', 'Failed to generate invoice: ' . $e->getMessage());
        }
    }

    public function downloadInvoice($id)
    {
        try {
            $order = Order::with(['user', 'user_address', 'order_items.product'])->findOrFail($id);

            $pdf = Pdf::loadView('download.invoice', compact('order'))
                ->setPaper('a4', 'portrait');

            // Define file name and path
            $fileName = "invoice_{$order->order_no}.pdf";
            $filePath = "invoices/{$fileName}";

            // Store PDF file in public storage
            Storage::disk('public')->put($filePath, $pdf->output());

            // Generate file URL
            $fileUrl = asset("storage/{$filePath}");

            return response()->json([
                'success'  => true,
                'file_url' => $fileUrl,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to generate invoice: ' . $e->getMessage(),
            ], 500);
        }
    }

}
