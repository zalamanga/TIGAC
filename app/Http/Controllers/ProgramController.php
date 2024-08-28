<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Services\ProgramService;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    protected $programService;

    public function __construct(ProgramService $programService)
    {
        $this->programService = $programService;
    }

    public function frontEndPage()
    {
        return view('pages.frontend.program');
    }

    public function store(ProgramRequest $request)
    {
        try {
            $programRequest = ($request->validated());

            $this->programService->store($programRequest);

            Alert::success('Success', 'Success Register to Program');
            return redirect()->route('pages.frontend.program');
        } catch (\Throwable $th) {
            Alert::success('Error', 'Failed Register to Program');
            return redirect()->route('pages.frontend.program');
        }
    }
}
