<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = product::join('order_items', 'order_items.product_id', '=', "product.id")
            ->join('orders', 'orders.id', '=', "order_items.order_id")->where('user_id', Auth::id())
            ->where('order_id', session('checkout_order_id'))->get();
        $checkout = Checkout::where(['user_id' => Auth::id(), 'order_id' => session('checkout_order_id')])->first();
        return view('checkout_success', compact(['checkout', 'order']));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderItems = Product::join('order_items', 'order_items.product_id', '=', "product.id")
            ->join('orders', 'orders.id', '=', "order_items.order_id")->where('user_id', Auth::id())
            ->where('order_id', session('order_id'))->get();
        $order_total = Order::find(session('order_id'));
        return view('checkout', compact(['orderItems', 'order_total']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestedValue = ['Name', 'email', 'country', 'state', 'city', 'street_address', 'phone'];
        $validated = $request->validate([
            'Name' => 'required|min:5',
            'email' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required|max:255',
            'street_address' => 'required',
            'phone' => 'required|max:14',
        ]);

        // collect makes new collection
        $data = collect([
            $request->except('_token', 'checkout_payment_method'),
            [
                'user_id' => Auth::id(),
                'order_id' => session('order_id')
            ]
        ])->collapse()->all(); //two arrays request and id array merged

        $order = Order::find(session('order_id'));
        if ($request->has($requestedValue)) {
            if (Checkout::create($data)) {
                $order->order_status = "purchased";
                $order->save();
                session(['checkout_order_id' => session('order_id')]);
                session(['order_id' => 0]);
                return redirect(route('checkout.index'))->with('success', 'Thankyou for Purchasing');
            }
        } else {
            return "failed";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
