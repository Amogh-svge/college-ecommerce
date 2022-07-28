<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function index()
    {
        $random_product = Product::with('reviews')->with('categ')->inRandomOrder()->limit(12)->get();
        $latestProduct = Product::with('reviews')->latest()->limit(10)->get();
        $categoriesItem = Categories::with('productReturner')->limit(3)->get();

        return view('home', ['allproducts' => $random_product, 'categoriesItem' => $categoriesItem, 'latestProduct' => $latestProduct]);
    }


    public function productShow($id)
    {
        $productReview = Reviews::where('product_id', $id)->paginate(3);
        $productAllReview = Reviews::where('product_id', $id)->get();
        $currentProduct = Product::find($id);
        $relatedProduct = Product::where('category_id', $currentProduct->category_id)->whereNot('id', $id)->limit(10)->get();
        return view('product', compact(['currentProduct', 'productReview', 'productAllReview', 'relatedProduct']));
    }


    public function categoryShow($id) //displays specific category
    {
        $cat_id = Categories::find($id);
        $LatestProducts = product::latest()->limit(5)->get();
        $AllProducts = product::where(['category_id' => $id])->paginate(5);
        $categories = categories::with('productReturner')->get();
        return view('categories', compact(['cat_id', 'AllProducts', 'LatestProducts', 'categories']));
    }

    public function allCategoryShow() //displays all categories
    {
        $allCategories = Categories::all();
        $LatestProducts = product::latest()->limit(5)->get();
        $categories = categories::with('productReturner')->get();
        return view('all-categories', compact(['LatestProducts', 'allCategories', 'categories']));
    }


    public function aboutUs()
    {
        return view('about-us');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function updateCart(Request $request) // update Cart-Items
    {
        // Update OrderItems quantity and price
        $orderItems = OrderItem::where('product_id', $request->product_id)->where('order_id', session('order_id'))->with('order')->first();
        $old_quantity = $orderItems->quantity;
        $old_total = $orderItems->total;
        $orderItems->quantity = $request->cart_quantity;
        $orderItems->total = $orderItems->product_price * $orderItems->quantity;
        // return $order_total = $orderItems->order->sub_total - $old_total + $orderItems->total;

        //update order price 
        if ($orderItems->total > 0 && $orderItems->quantity > 0) {
            $orderItems->order->sub_total = $orderItems->order->sub_total - $old_total + $orderItems->total;
            $orderItems->order->total_price = $orderItems->order->sub_total + $orderItems->order->shipping_price - $orderItems->order->discount;
            if ($orderItems->quantity != $old_quantity) {
                $orderItems->order->save();
                if ($orderItems->save()) {
                    return redirect()->route("cart.index")->with('success', "Cart Updated Successfully");
                } else {
                    return redirect()->route("cart.index")->with('failure', "Failed to Update Cart");
                }
            } else {
                return redirect()->route("cart.index");
            }
        } else {
            return redirect()->route("cart.index")->with('failure', "Item Quantity should be above 0");
        }
    }

    public function displayShop() // All shop items displayed
    {
        $categories = categories::with('productReturner')->get();
        $allProducts = product::latest()->with('categ')->paginate('9');
        $LatestProducts = product::latest()->limit(5)->get();
        return view('shop', compact(['LatestProducts', 'allProducts', 'categories']));
    }

    public function displayStatement() // All order statements displayed
    {
        $orders = Order::with('orderItem')->where(['user_id' => Auth::id(), 'order_status' => 'purchased'])->get();
        // foreach ($orders->orderItem as $item) {
        //     return $item->product->prod_name . "</br>";
        // }

        return view('statement', compact(['orders']));
    }
}
