<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Frontend\City;
use App\Models\Frontend\Address;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Governorate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        $governorates = Governorate::all();
        $cities = City::all();
        return view('frontend.profile', compact('addresses', 'governorates', 'cities'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'phone' => ['numeric', 'nullable'],
        ]);

        if (Auth::check()) {
            User::findOrFail(Auth::user()->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
            ]);
            alert()->success(__('message.Profile Update'));
            return redirect('/profile')->with('success_msg', 'Profile updated successfully');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8', 'same:new_password'],
        ]);

        if (Auth::check()) {
            if (Hash::check($request->password, Auth::user()->password)) {
                if ($request->new_password == $request->confirm_password) {
                    User::findOrFail(Auth::user()->id)->update([
                        'password' => Hash::make($request->new_password),
                    ]);
                } else {
                    alert()->error(__('message.Not match'));
                    return redirect('/profile')->with('success_msg', __('message.Not match'));
                }
            } else {
                alert()->error(__('message.Wrong Password'));
                return redirect('/profile')->with('error_msg', __('message.Wrong Password'));
            }
            alert()->success(__('message.Password Update'));
            return redirect('/profile')->with('error_msg', __('message.Password Update'));
        }
    }

    public function getCity(Request $request)
    {
        $data['cities'] = City::where("governorate_id",$request->governorate_id)
            ->get(["city_ar", "city_en", "id"]);
        return response()->json($data);
    }

    public function addNewAddress(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'phone' => ['numeric', 'required', 'digits:11'],
            'governorate_id' => ['integer', 'required'],
            'city'   => ['integer', 'required'],
            'address' => ['string', 'required'],
            'company' => ['string', 'nullable'],
            'pincode'   => ['numeric', 'nullable'],
        ]);

        $data = new Address();
        $data->user_id = Auth::user()->id;
        $data->email = Auth::user()->email;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->governorate_id = $request->governorate_id;
        $data->city = $request->city;
        $data->address = $request->address ?? '';
        $data->pincode = $request->pincode ?? '';
        $data->company = $request->company ?? '';
        $data->save();

        alert()->success(__('message.New Address Added'));
        return redirect()->back();
    }

    public function deleteAddress($id)
    {
        Address::findOrFail($id)->delete();
        alert()->success(__('message.Address Deleted'));
        return redirect()->back();
    }
}
