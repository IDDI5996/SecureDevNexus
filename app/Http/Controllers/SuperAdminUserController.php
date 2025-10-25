<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminUserController extends Controller
{
     public function index()
    {
        return view('superadmin.users');
    }
}
