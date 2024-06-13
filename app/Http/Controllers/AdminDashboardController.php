<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    protected $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $title = 'Admin Dashboard';
        $loggedUserData = $this->userService->getLoggedUser();
    
        return view('pages.admin.index')->with([
            'title' => $title,
            'loggedUserData' => $loggedUserData
        ]);
    }
}
