<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function searchBar(Request $request)
    {
        $searchVal = $request['search'];
        $LatestProducts = product::latest()->limit(5)->get();
        $searchedItem = Product::where('prod_name', 'LIKE', '%' . $searchVal . '%')
            ->orWhere('prod_desc', 'LIKE', '%' . $searchVal . '%')->paginate(9);
        $categories = Categories::with('productReturner')->get();
        //return count($searchedItem);
        if ($searchVal != '' && count($searchedItem) != 0) {
            return view('search', compact(['searchedItem', 'LatestProducts', 'searchVal', 'categories']));
        } else {
            return view('search', compact(['searchedItem', 'LatestProducts', 'searchVal', 'categories']))->with('failure', 'No Results Found');
        }
    }
}
