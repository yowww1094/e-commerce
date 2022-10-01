<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('uploads/category',$filename);
            $category->image = 'uploads/category/'.$filename;
        }

        $category->status = $request->status == true ? '1':'0';
        $category->meta_name = $validatedData['meta_name'];
        $category->meta_slug = $validatedData['meta_slug'];
        $category->meta_description = $validatedData['meta_description'];

        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($category);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        $path = $category->image;
        if ($request->hasFile('image')) 
        {
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('uploads/category',$filename);
            $category->image = 'uploads/category/'.$filename;
        }

        $category->status = $request->status == true ? '1':'0';
        $category->meta_name = $validatedData['meta_name'];
        $category->meta_slug = $validatedData['meta_slug'];
        $category->meta_description = $validatedData['meta_description'];

        $category->update();

        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }
}
