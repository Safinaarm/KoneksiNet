<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'role' => 'required|string|max:255', // Validate the role field
        ]);
    
        Menu::create([
            'title' => $request->title,
            'url' => $request->url,
            'Role' => $request->role, // Add the Role field here
        ]);
    
        return redirect()->route('menu.create')->with('success', 'Menu created successfully');
    }
    

    public function index()
    {
        $menus = Menu::all();
        return view('menu.create', compact('menus'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'role' => 'required|string|max:255', // Validate the role field
        ]);
    
        Menu::create([
            'title' => $request->title,
            'url' => $request->url,
            'Role' => $request->Role, // Add the Role field here
        ]);

        return redirect()->route('menu.create')->with('success', 'Menu updated successfully');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.create')->with('success', 'Menu deleted successfully');
    }
}

