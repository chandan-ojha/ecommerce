<?php
namespace App\Http\Controllers\Frontend;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function view(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $cartItems   = CartItem::where('user_id', $user->id)->get();
            $userAddress = UserAddress::where('user_id', $user->id)->first();

            if ($cartItems->count() > 0) {
                return Inertia::render('Frontend/Pages/Checkout', [
                    'title'       => 'Checkout',
                    'cartItems'   => $cartItems,
                    'userAddress' => $userAddress,
                ]);
            }

        } else {
            $cartItems = Cart::getCookieCartItems();

            if (count($cartItems) > 0) {
                $cartItems = new CartResource(Cart::getProductsAndCartItems());

                return Inertia::render('Frontend/Pages/Checkout', [
                    'title'     => 'Checkout',
                    'cartItems' => $cartItems,
                ]);

            } else {
                return redirect()->back();
            }
        }
    }

    public function placeOrder(Request $request)
    {
        $user        = $request->user();
        $carts       = $request->carts ?? [];
        $products    = $request->products ?? [];
        $addressInfo = $request->address_info ?? null;

        $mergedData = [];

        foreach ($carts as $cartItem) {
            foreach ($products as $product) {
                if ($cartItem["product_id"] == $product["id"]) {
                    $mergedData[] = array_merge($cartItem, ["title" => $product["title"], 'price' => $product['price']]);
                }
            }
        }

        DB::beginTransaction();

        try {

            $currentAddress = $user->user_address()->first();

            $address = UserAddress::create([
                'phone'   => $addressInfo['phone'],
                'region'  => $addressInfo['region'],
                'city'    => $addressInfo['city'],
                'area'    => $addressInfo['area'],
                'address' => $addressInfo['address'],
                'user_id' => $user->id,
            ]);

            $order = Order::create([
                'order_no'        => 'ORD-' . strtoupper(uniqid()),
                'total_price'     => $request->total,
                'payment_mode'    => 'cod',
                'order_status'    => 'unpaid',
                'created_by'      => $user->id,
                'user_address_id' => $address->id,
            ]);

            $cartItems = CartItem::where(['user_id' => $user->id])->get();

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity'   => $cartItem->quantity,
                    'unit_price' => $cartItem->product->price,
                ]);

                $cartItem->delete();
                $cartItems = Cart::getCookieCartItems();

                foreach ($cartItems as $item) {
                    unset($item);
                }

                array_splice($cartItems, 0, count($cartItems));
                Cart::setCookieCartItems($cartItems);
            }

            DB::commit();

            return redirect()->route('thankyou.view');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Order creation failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to place order: ' . $e->getMessage(),
            ], 500);
        }
    }

}
