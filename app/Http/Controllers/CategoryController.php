<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use Auth;

class CategoryController extends Controller
{
    public function store(Request $request) {
        $category = Category::create($request->only("name","color"));

        $category->user()->associate(Auth::user());

        $category->save();

        return redirect()->route("users.categories");
    }
}
