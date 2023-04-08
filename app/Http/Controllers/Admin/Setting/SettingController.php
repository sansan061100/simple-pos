<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
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
        # code...
    }
}
