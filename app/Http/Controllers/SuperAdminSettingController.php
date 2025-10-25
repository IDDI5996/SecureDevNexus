<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminSettingController extends Controller
{
    public function index()
    {
        return view('superadmin.settings');
    }
}
