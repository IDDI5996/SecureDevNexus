<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\PortfolioItem;
use App\Models\TeamMember;

class AdminController extends Controller
{
    public function dashboard()
    {
        $servicesCount = Service::count();
        $portfolioCount = PortfolioItem::count();
        $teamCount = TeamMember::count();
        
        return view('admin.dashboard', compact('servicesCount', 'portfolioCount', 'teamCount'));
    }
    
    // Services Management
    public function services()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }
    
    public function storeService(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);
        
        Service::create($request->all());
        
        return redirect()->route('admin.services')->with('success', 'Service added successfully!');
    }
    
    public function updateService(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);
        
        $service = Service::findOrFail($id);
        $service->update($request->all());
        
        return redirect()->route('admin.services')->with('success', 'Service updated successfully!');
    }
    
    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        
        return redirect()->route('admin.services')->with('success', 'Service deleted successfully!');
    }
    
    // Portfolio Management
    public function portfolio()
    {
        $portfolio = PortfolioItem::all();
        return view('admin.portfolio', compact('portfolio'));
    }
    
    public function storePortfolio(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'icon' => 'required|string'
        ]);
        
        PortfolioItem::create($request->all());
        
        return redirect()->route('admin.portfolio')->with('success', 'Portfolio item added successfully!');
    }
    
    public function updatePortfolio(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'icon' => 'required|string'
        ]);
        
        $portfolio = PortfolioItem::findOrFail($id);
        $portfolio->update($request->all());
        
        return redirect()->route('admin.portfolio')->with('success', 'Portfolio item updated successfully!');
    }
    
    public function deletePortfolio($id)
    {
        $portfolio = PortfolioItem::findOrFail($id);
        $portfolio->delete();
        
        return redirect()->route('admin.portfolio')->with('success', 'Portfolio item deleted successfully!');
    }
    
    // Team Management
    public function team()
    {
        $team = TeamMember::all();
        return view('admin.team', compact('team'));
    }
    
    public function storeTeam(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'required|string'
        ]);
        
        TeamMember::create($request->all());
        
        return redirect()->route('admin.team')->with('success', 'Team member added successfully!');
    }
    
    public function updateTeam(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'required|string'
        ]);
        
        $team = TeamMember::findOrFail($id);
        $team->update($request->all());
        
        return redirect()->route('admin.team')->with('success', 'Team member updated successfully!');
    }
    
    public function deleteTeam($id)
    {
        $team = TeamMember::findOrFail($id);
        $team->delete();
        
        return redirect()->route('admin.team')->with('success', 'Team member deleted successfully!');
    }
    
    public function superDashboard()
    {
        return view('super-admin.dashboard'); // Make sure this view exists
    }

    public function manageUsers()
    {
        // Your user management logic here
        return view('super-admin.users'); // Make sure this view exists
    }
}
