<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function new_form_cat(Request $request)
    {
        return view('admin.new-category-form');
    }

    public function create_cat(Request $request){
        $validated = $request->validate([
            'name' => "required|max:255|unique:categories,name",
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        Category::create($validated);

        return redirect(route('admin-page'));
    }
}
