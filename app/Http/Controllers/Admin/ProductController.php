<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\categories;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if superAdmin then all-Products else user-uploaded products
        Auth::user()->role_id == Role::$SUPER_ADMIN ?
            $product = Product::all() :
            $product = Product::latest()->where('users_id', Auth::id())->get();
        return view('Admin.Products.product-list', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-action');
        $categories = Categories::all();
        return view('Admin.Products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'prod_name' => 'required|min:5|unique:Product',
            'price' => 'required',
            'category_id' => 'required|integer|min:1',
            'prod_desc' => 'required',
            'short_desc' => 'required|max:255',
            'specification' => 'required',
        ]);

        $RequestedValue = ['image', 'prod_desc', 'prod_name', 'price', 'short_desc'];

        if ($request->has($RequestedValue) && $request->hasFile('image')) {
            $name = uniqid() . Date('yd') . $request->file('image')->getClientOriginalName();
            $data = collect([$request->except('image'), ["image" => $name, "users_id" => Auth::id()]]);
            $inputData = $data->collapse();
            $request->file('image')->storeAs('public/images', $name);
            image_crop($name, $request->category_id);
            Product::create($inputData->all());
            return redirect()->route('products.index')->with('success', 'Product Added Successfully');
        } else {
            return back()->with('failure', 'Failed to Add Product');
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
    public function edit(Product $product)
    {
        Gate::authorize('product-action', $product);
        $categories = Categories::all();
        $editProduct = $product;
        return view('Admin.Products.product-edit', compact(['editProduct', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //using gate authorization method to check user authorization
        Gate::authorize('product-action', $product);
        $validated = $request->validate([
            'prod_name' => 'required|min:5',
            'price' => 'required',
            'category_id' => 'required|integer|min:1',
            'prod_desc' => 'required',
            'short_desc' => 'required|max:255',
            'image' => 'required',
        ]);

        if ($request->has(['prod_name'])) {
            $product->update($request->except('_token'));
            return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
        } else {
            return redirect()->route('products.index')->with('failue', 'Failed To Update Product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        Gate::authorize('product-action', $product);
        if ($id != null) {
            Product::where('id', ['id' => $id])->delete();
            return redirect(route('products.index'))->with('success', 'Successfully Deleted');
        }
        return redirect(route('products.index'))->with('failure', 'Failed to Delete');
    }
}
