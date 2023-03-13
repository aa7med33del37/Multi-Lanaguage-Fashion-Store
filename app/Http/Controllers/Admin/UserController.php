<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $result['admins'] = User::where('role', 'admin')->orderBy('id', 'ASC')->get();
        $result['users'] = User::where('role', 'user')->orderBy('id', 'DESC')->get();
        return view('admin.user.index', $result);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string'],
            'email'     => ['required', 'email', 'unique:users,email'],
            'password'  => ['required'],
            'role'      => ['required', 'string'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->name);
        $user->role = $request->role ?? 'user';

        $user->save();
        return redirect('admin/users')->with('success_msg', __('message.Data Added'));
    }

    public function delete(Request $request, $id)
    {
        if ($id != '1') {
            User::findOrFail($id)->delete();
            return redirect('admin/users')->with('success_msg', __('message.Data Deleted'));
        } else {
            return redirect('admin/users')->with('error_msg', 'You can\'t delete the main admin');
        }
    }

    public function profile($id)
    {
        $data = User::where('role', 'admin')->where('id', $id)->first();
        return view('admin.user.profile', compact('data'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name'  => ['string', 'required'],
            'email' => ['email', 'required'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
        ]);
        $data = User::where('role', 'admin')->where('id', $id)->first();
        $data->name = $request->name;
        $data->email = $request->email;

        $path = 'uploads/users/';
        if ($request->hasFile('image')){
            if (File::exists($data->image)) {
                File::delete($data->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move($path, $fileName);
            $data->image = $path . $fileName;
        }
        $data->update();
        return redirect()->back();
    }
}
