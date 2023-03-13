<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\SettingRequest;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }

    public function manage($id=NULL)
    {
        if ($id == NULL) {
            return view('admin.setting.manage');
        }else {
            $setting = Setting::findOrFail($id);
            return view('admin.setting.manage', compact('setting'));
        }
    }

    public function store(SettingRequest $request, $id=NULL)
    {
            $validatedData = $request->validated();

            if ($id == NULL) {
                $setting = new Setting();
                $setting->website_name = $validatedData['website_name'];
                $setting->website_url = $validatedData['website_url'];
                $setting->page_title = $validatedData['page_title'];
                $setting->phone = $validatedData['phone'];
                $setting->phone2 = $validatedData['phone2'];
                $setting->email = $validatedData['email'];
                $setting->email2 = $validatedData['email2'];
                $setting->address_en = $validatedData['address_en'];
                $setting->address_ar = $validatedData['address_ar'];
                $setting->facebook = $validatedData['facebook'];
                $setting->twitter = $validatedData['twitter'];
                $setting->instagram = $validatedData['instagram'];
                $setting->youtube = $validatedData['youtube'];
                $setting->about_en = $validatedData['about_en'];
                $setting->about_ar = $validatedData['about_ar'];

                $path = 'uploads/setting/';
                if ($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    $ext = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $ext;
                    $file->move($path, $fileName);
                    $setting->image = $path . $fileName;
                }

                $setting->save();
            } else {
                $setting = Setting::findOrFail($id);
                $setting->website_name = $validatedData['website_name'];
                $setting->website_url = $validatedData['website_url'];
                $setting->page_title = $validatedData['page_title'] ?? $validatedData['website_name'];
                $setting->phone = $validatedData['phone'];
                $setting->phone2 = $validatedData['phone2'];
                $setting->email = $validatedData['email'];
                $setting->email2 = $validatedData['email2'];
                $setting->address_en = $validatedData['address_en'];
                $setting->address_ar = $validatedData['address_ar'];
                $setting->facebook = $validatedData['facebook'];
                $setting->twitter = $validatedData['twitter'];
                $setting->instagram = $validatedData['instagram'];
                $setting->youtube = $validatedData['youtube'];
                $setting->about_en = $validatedData['about_en'];
                $setting->about_ar = $validatedData['about_ar'];

                $path = 'uploads/setting/';
                if ($request->hasFile('logo')) {
                    if (File::exists($setting->logo)) {
                        File::delete($setting->logo);
                    }
                    $file = $request->file('logo');
                    $ext = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $ext;
                    $file->move($path, $fileName);
                    $setting->logo = $path . $fileName;
                }

                // if ($request->hasFile('favicon')) {
                //     if (File::exists($setting->favicon)) {
                //         File::delete($setting->favicon);
                //     }
                //     $file = $request->file('favicon');
                //     $ext = $file->getClientOriginalExtension();
                //     $fileName = time() . '.' . $ext;
                //     $file->move($path, $fileName);
                //     $setting->favicon = $path . $fileName;
                // }
                $setting->update();
            }
            return redirect()->route('settings.index');
    }
}
