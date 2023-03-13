<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $parentCategories = Category::where('parent_id', '0')->orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('parentCategories'));
    }


    public function create()
    {
        $parentCategories = Category::where('parent_id', '0')->get();
        return view('admin.category.create', compact('parentCategories'));
    }

    public function store(CategoryFormRequest $request)
    {
        $validated_data = $request->validated();
        $category = new Category();

        $category->name_en = $validated_data['name_en'];
        $category->name_ar = $validated_data['name_ar'];
        $category->slug = Str::slug($validated_data['name_en']);
        $category->parent_id = $validated_data['parent_id'] ?? '0';
        $category->meta_title = $validated_data['meta_title'] ?? $validated_data['name_en'];
        $category->status = $request->status ?? '0';

        $path = 'uploads/category/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move($path, $fileName);
            $category->image = $path . $fileName;
        }

        $category->save();
        return redirect()->route('categories.index')->with('success_msg', __('message.Data Added'));
    }


    public function edit(Category $category)
    {
        if ($category) {
            $parentCategories = Category::where('parent_id', '0')->get();
            $check = $category->childs->count() > 0;
            if ($check) {
                $disabled = 'disabled';
                $text = 'Can not add parent because it is a parent category and has childs category';
                return view('admin.category.edit', compact('category', 'parentCategories', 'disabled', 'text'));
            } else {
                return view('admin.category.edit', compact('category', 'parentCategories'));
            }
        } else {
            return redirect()->route('categories.index')->with('error_msg', __('message.Data Not Found'));
        }
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $validated_data = $request->validated();

        $check = $category->childs->count() > 0;
        if ($check) {
            $category->parent_id = '0';
        } else {
            $category->parent_id = $validated_data['parent_id'] ?? '0';
        }

        $category->name_en = $validated_data['name_en'];
        $category->name_ar = $validated_data['name_ar'];
        $category->slug = Str::slug($validated_data['name_en']);
        $category->meta_title = $validated_data['meta_title'];
        $category->status = $request->status ?? '0';

        if ($request->hasFile('image')) {
            if (File::exists($category->image)) {
                File::delete($category->image);
            }

            $path = 'uploads/category/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move($path, $fileName);
            $category->image = $path . $fileName;
        }
        $category->update();
        return redirect()->route('categories.index')->with('success_msg', __('message.Data Updated'));
    }


    public function destroy(Category $category)
    {

        if ($category->childs()->count() > 0) {
            return redirect()->route('categories.index')->with('error_msg', __('message.Category Not Deleted'));
        } else {
            if (File::exists($category->image)) {
                File::delete($category->image);
            }
            $category->delete();
            return redirect()->route('categories.index')->with('success_msg', __('message.Data Deleted'));
        }


    }
}
