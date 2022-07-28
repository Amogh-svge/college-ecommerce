<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\View\Components\forms\Input;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{

    public function index()
    {
        $user = User::find(Auth::id());
        if ($user != null) {
            $orders = product::join('order_items', 'order_items.product_id', '=', "product.id")
                ->join('orders', 'orders.id', '=', "order_items.order_id")->where('user_id', Auth::id())
                ->where('order_id', session('order_id'))->get();
            $order_total = order::where('id', session('order_id'))->get();

            return view('cart', compact(['orders', 'order_total']));
        }
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $order_product = Product::find($request->product_id);
        //checking if there is valid order_id in the session. 
        $order_id = session('order_id', 0);
        if ($order_id < 1) {
            //creating order if there is no order_id in the session.
            $order = new Order();
            $order->user_id = Auth::id();
            $order->order_status = 'cart';
            $order->discount = 0;
            $order->sub_total = 0;
            $order->shipping_price = 0;
            $order->total_price = 0;
            $order->save();
            session(['order_id' => $order->id]);
            $order_id = $order->id;
        }
        // creating order-items.

        $item = OrderItem::where(['order_id' => $order_id, 'product_id' => $request->product_id])->first(); //Selects orderItem
        $total_item = collect($item);
        $order_item = new OrderItem();
        $single_item_total = 0;

        if (count($total_item) == 0) {
            $order_item->product_id = $request->product_id;
            $order_item->order_id = $order_id;
            $order_item->quantity = $request->quantity;
            $order_item->product_price = $order_product->price;
            $order_item->total =  $request->quantity * $order_product->price;
            $order_item->save();

            //updating order-table with total price.
            $order = Order::find($order_id);
            $order->sub_total += $order_item->total;
            $order->shipping_price = 25;
            $order->total_price = $order->sub_total - $order->discount + $order->shipping_price;
        } else {
            $item->quantity += $request->quantity;
            $old_total = $item->total;
            $item->total = $item->quantity * $order_product->price;
            $item->save(); //gcode  


            //updating order-table with total price.
            $order = Order::find($order_id);
            $old_sub_total = $order->sub_total;
            $order->sub_total = $item->total + $old_sub_total - $old_total;
            $order->shipping_price = 25;
            $order->total_price = $order->sub_total - $order->discount + $order->shipping_price;
        }


        if ($order->save()) {
            return redirect()->route('cart.index')->with('success', 'Product Added to Cart');
        } else {
            return redirect()->route('cart.index')->with('failure', 'Product Failed to Add');
        }
    }


    public function show(OrderItem $orderItem)
    {
    }

    
    public function edit(OrderItem $orderItem)
    {
        //
    }


    public function update(Request $request)
    {
        //
    }


    public function destroy($id)
    {
        try {
            // reduces total price if product is removed from cart
            $cartItem = OrderItem::where('product_id', $id)->with('order')->first(); //with first we can edit the item array
            $cartItem->order->sub_total -= $cartItem->total;
            $cartItem->order->total_price -= $cartItem->total;
            $cartItem->order->save();
            if ($cartItem->delete()) {
                return redirect()->route('cart.index')->with('success', 'Item has been Removed');
            } else {
                return redirect()->route('cart.index')->with('failure', 'Failed To Remove Item');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cart.index')->with('failure', 'Failed To Remove Item');
        }
    }
}
