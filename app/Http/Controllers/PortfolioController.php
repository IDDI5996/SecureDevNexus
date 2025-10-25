<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioItem;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = PortfolioItem::all();
        return view('portfolio', compact('portfolio'));
    }

    public function show($id)
    {
        $project = PortfolioItem::findOrFail($id);
        return view('portfolio.show', compact('project'));
    }
}
