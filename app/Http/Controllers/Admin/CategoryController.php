<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequestForm;


class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.admin.category.index');
    }

    public function create()
    {
        return view('pages.admin.category.create');
    }

    public function store(CategoryRequestForm $request)
    {
        $validatedData = $request->validated();
        $category = new Category;

        $category->title = $validatedData['title'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/category/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move($uploadPath, $filename);
            $category->image = $uploadPath . $filename;
        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->save();
        return redirect(route('admin.category'))->with('message', 'Successfully Created New Categoty');
    }

    public function show($category)
    {
        $categories = Category::findOrFail($category);
        return view('pages.admin.category.show', ['categories' => $categories]);
    }

    public function edit($category)
    {
        $categories = Category::findOrFail($category);
        return view('pages.admin.category.edit', ['categories' => $categories]);
    }

    public function update(CategoryRequestForm $request, $category)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($category);

        $category->title = $validatedData['title'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/category/';

            if (File::exists($uploadPath)) {
                File::delete($uploadPath);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move($uploadPath, $filename);
            $category->image = $uploadPath . $filename;
        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->update();
        return redirect(route('admin.category'))->with('message', 'Successfully Update Category');
    }

    public function destroy($category)
    {
        $category = Category::findOrFail($category);

        $uploadPath = 'uploads/category/';
        if (File::exists($uploadPath)) {
            File::delete($uploadPath);
        }

        $category->delete();
        session()->flash('message', 'Category has been removed');
        return redirect()->back()->with('message', 'Category has been removed');
    }
}
