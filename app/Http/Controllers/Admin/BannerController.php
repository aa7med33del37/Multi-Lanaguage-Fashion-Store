<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::orderBy('id', 'DESC')->get();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'required|image|mimes:png,jpg,jpeg',
            'title_en'       => 'nullable|string',
            'title_ar'       => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
        ]);

        $banner = new Banner();
        $banner->title_en       = $request->title_en ?? '';
        $banner->title_ar       = $request->title_ar ?? '';
        $banner->description_en = $request->description_en ?? '';
        $banner->description_ar = $request->description_ar ?? '';

        $path = 'uploads/banner/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move($path, $fileName);
            $banner->image = $path . $fileName;
        }
        $banner->save();
        return redirect()->route('banners.index')->with('success_msg', __('message.Data Added'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image'       => 'image|mimes:png,jpg,jpeg',
            'title_en'       => 'nullable|string',
            'title_ar'       => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
        ]);

        $banner->title_en = $request->title_en ?? '';
        $banner->title_ar = $request->title_ar ?? '';
        $banner->description_en = $request->description_en ?? '';
        $banner->description_ar = $request->description_ar ?? '';

        $path = 'uploads/banner/';
        if ($request->hasFile('image')) {

            if (File::exists($banner->image)) {
                File::delete($banner->image);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move($path, $fileName);
            $banner->image = $path . $fileName;
        }
        $banner->update();
        return redirect()->route('banners.index')->with('success_msg', __('message.Data Updated'));
    }

    public function destroy(Banner $banner)
    {
        if ($banner) {
            if (File::exists($banner->image)) {
                File::delete($banner->image);
            }
            $banner->delete();
            return redirect()->route('banners.index')->with('success_msg', __('message.Data Deleted'));
        } else {
            return redirect()->route('banners.index')->with('error_msg', __('message.Something Wrong'));
        }
    }
}
