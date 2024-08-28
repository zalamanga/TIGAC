<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function frontEndPage()
    {
        return view('pages.frontend.program');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
