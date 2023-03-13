<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'color'     => 'string|required',
            'color_ar'  => 'string|nullable',
            'code'      => 'string|required',
        ]);

        $data = new Color();
        $data->color = $request->color;
        $data->color_ar = $request->color_ar ?? $request->color;
        $data->code = $request->code;
        $data->save();

        return redirect()->route('colors.index')->with('success_msg', __('message.Data Added'));
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $checkOther = Color::where('id', '!=', $color->id)->where('color', $request->color)->exists();
        if ($checkOther) {
            $colorValidate = 'string|required|unique:colors,color';
        } else {
            $colorValidate = 'string|required';
        }
        $request->validate([
            'color' => $colorValidate,
            'code'  => 'string|required',
        ]);

        $color->color = $request->color;
        $color->color_ar = $request->color_ar ?? $request->color;
        $color->code = $request->code;
        $color->update();

        return redirect()->route('colors.index')->with('success_msg', __('message.Data Updated'));
    }

    public function destroy(Request $request, Color $color)
    {
        if ($color) {
            $color->delete();
            return redirect()->route('colors.index')->with('success_msg', __('message.Data Deleted'));
        } else {
            return redirect()->route('colors.index')->with('success_msg', __('message.Something Wrong'));
        }

    }
}
