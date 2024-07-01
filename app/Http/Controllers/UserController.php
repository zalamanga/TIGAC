<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UserDataTable $dataTable) {
        $title = 'User List';


        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.user.index", $data);
    }

    public function create(UserDataTable $dataTable) {
        $title = 'Create New User';

        return view('pages.admin.user.show', [
            'title' => $title
        ]);
    }

    public function store(UserRequest $userRequest)
    {
        $userData = $userRequest->validated();

        $this->userService->createUser($userData);

        Alert::success('Success', 'Success create new user');
        return redirect()->route('userManagement.index');
    }

    public function destroy($userId)
    {
        $this->userService->deleteUser($userId);

        Alert::success('Success', 'Success delete user');
        return redirect()->route('userManagement.index');
    }


}
