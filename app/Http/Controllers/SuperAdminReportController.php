<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminReportController extends Controller
{
    public function index()
    {
        return view('superadmin.reports');
    }
}
