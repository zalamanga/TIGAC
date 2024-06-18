<?php

namespace App\Http\Controllers;

use App\Contracts\UserRepositoryInterface;
use App\Services\UserService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    protected $userInterface;
    
    public function __construct(UserRepositoryInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function index()
    {
        $title = 'Admin Dashboard';
        $loggedUserData = $this->userInterface->getLoggedUser();
    
        return view('pages.admin.index')->with([
            'title' => $title,
            'loggedUserData' => $loggedUserData
        ]);
    }
}
