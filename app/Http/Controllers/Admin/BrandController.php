<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\BrandFormRequest;
use App\Http\Requests\Admin\BrandUpdateRequest;


class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandFormRequest $request)
    {
        $validated_data = $request->validated();
        $brand = new Brand();
        $brand->name = $validated_data['name'];
        $brand->slug = Str::slug($validated_data['name']);
        $brand->status = $request->status ? '1' : '0';
        $brand->meta_title = $validated_data['meta_title'] ?? $validated_data['name'];

        if ($request->hasFile('image')) {
            $path = 'uploads/brand/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move($path, $fileName);
            $brand->image = $path . $fileName;
        }
        $brand->save();
        return redirect()->route('brands.index')->with('success_msg', __('message.Data Added'));
    }

    public function edit(Brand $brand)
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.brand.edit', compact('brand', 'categories'));
    }

    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $validated_data = $request->validated();

        $other = Brand::where('id', '!=', $brand->id)->where('name', $validated_data['name'])->exists();
        if ($other) {
            return redirect()->route('brands.edit', $brand->id)->with('error_msg', __('message.Brand Already Exist'));
        } else {
            $brand->name = $validated_data['name'];
            $brand->slug = Str::slug($validated_data['name']);
            $brand->status = $request->status ? '1' : '0';
            $brand->meta_title = $validated_data['meta_title'] ?? $validated_data['name'];

            if ($request->hasFile('image')) {
                if (File::exists($brand->image)) {
                    File::delete($brand->image);
                }
                $path = 'uploads/brand/';
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $file->move($path, $fileName);
                $brand->image = $path . $fileName;
            }
            $brand->update();
            return redirect()->route('brands.index')->with('success_msg', __('message.Data Updated'));
        }
    }

    public function destroy(Brand $brand)
    {
        if (File::exists($brand->image)) {
            File::delete($brand->image);
        }
        $brand->delete();
        return redirect()->route('brands.index')->with('success_msg', __('message.Data Deleted'));
    }
}
