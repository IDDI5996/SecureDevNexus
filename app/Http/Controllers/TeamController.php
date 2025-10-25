<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamController extends Controller
{
   public function index()
    {
        $team = TeamMember::all();
        return view('team', compact('team'));
    }
}
