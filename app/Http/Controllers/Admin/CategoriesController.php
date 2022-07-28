<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('super_admin-action');
        $category = Categories::all();
        return view('Admin.Categories.categories-list', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('super_admin-action');
        $parentCategory = categories::with('children')->where('parent_id', 0)->get();
        return view('Admin.Categories.create', compact('parentCategory'));
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
            'name' => 'required|min:5|unique:Categories',
            'description' => 'required',
            'parent_id' => 'required',

        ]);
        $RequestedValue = ['name', 'image', 'description'];
        $slug = strtolower(str_replace(' ', '_', $request->name));

        if ($request->has($RequestedValue)) {

            $image_name = uniqid() . Date('yd') . $request->file('image')->getClientOriginalName();
            $allData = collect([$request->except('image'), ["image" => $image_name, "slug" => $slug]]);
            $request->file('image')->storeAs('public/images', $image_name);
            category_image_crop($image_name);
            Categories::create($allData->collapse()->all());
            return redirect()->route('categories.index')->with('success', 'Category Added Successfully');
        } else {
            return back()->with('failure', 'Failed to Add Category');
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
        Gate::authorize('super_admin-action');
        $categories = Categories::find($id);
        return view('Admin.Categories.categories-edit', compact(['categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Responses
     */
    public function update(Request $request, categories $category)
    {
        Gate::authorize('super_admin-action');
        $validated = $request->validate([
            'name' => 'required|min:3|',
            'description' => 'required',
        ]);

        if ($request->has(['name'])) {
            $category->update($request->except('_token', 'category'));
            return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
        } else {
            return redirect()->route('categories.index')->with('failue', 'Category Update Failed');
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
        Gate::authorize('super_admin-action');
        if ($id != null) {
            Categories::where('id', ['id' => $id])->delete();
            return redirect(route('categories.index'))->with('success', 'Successfully Deleted');
        }
        return redirect(route('categories.index'))->with('failure', 'Failed to Delete');
    }
}
