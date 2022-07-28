<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $user = collect(Auth::user());
        $filtered = Arr::except($user, ['email_verified_at', 'email', 'name', 'id']);
        $data = collect([$request->except('_token'), $filtered])->collapse();
        if(Reviews::create($data->all())){
            return redirect()->back();
        }
    }

    public function destroy(Reviews $reviews)
    {
        //
    }
}
