<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data['title'] = 'Setting';
        return view('admin.setting.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'application_name' => 'required',
            'store_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $setting = Setting::updateOrCreate(
            ['id' => 1],
            [
                'application_name' => $request->application_name,
                'store_name' => $request->store_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'logo' => $request->logo ? $this->uploadImage($request->logo, 'setting') : null,
                'favicon' => $request->favicon ? $this->uploadImage($request->favicon, 'setting') : null,
                'address' => $request->address,
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Setting updated successfully',
            'data' => $setting,
        ], 200);
    }
}
