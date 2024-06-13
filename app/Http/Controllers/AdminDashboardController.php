<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $title = 'Admin Dashboard';
    
        return view('pages.admin.index')->with([
            'title' => $title
        ]);
    }
}
