<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending_orders = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_Items', 'orders.id', '=', 'order_Items.order_id')
            ->join('product', 'order_Items.product_id', '=', 'product.id')
            ->select('orders.*', 'users.name', 'users.email', 'order_Items.*', 'product.prod_name', 'product.category_id', 'product.users_id')
            ->where(['users_id' => Auth::id(), 'vendor_status' => 'not_approved', 'order_status' => 'purchased'])->orderBy('order_id')
            ->get();


        return view('Admin.order.order_status', compact(['pending_orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = collect(Product::where('users_id', Auth::id())->get())->pluck('id'); //ordered product id retrive
        $items = collect(OrderItem::join('orders', 'order_Items.order_id', '=', 'orders.id')
            ->with('product')->where(['order_status' => 'purchased'])->whereIn('product_id', $product)->get())->groupBy('order_id');
        return view('Admin.order.order_history', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
