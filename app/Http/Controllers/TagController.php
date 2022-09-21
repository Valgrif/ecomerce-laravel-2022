<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function new_form_tag(Request $request)
    {
        return view('admin.new-tag-form');
    }

    public function create_tag(Request $request){
        $validated = $request->validate([
            'name' => "required|max:255|unique:tags,name",
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        Tag::create($validated);

        return redirect(route('admin-page'));
    }
}
