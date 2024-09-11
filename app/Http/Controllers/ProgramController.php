<?php

namespace App\Http\Controllers;

use App\DataTables\ProgramDataTable;
use App\Http\Requests\ProgramRequest;
use App\Models\Program;
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

    public function index(ProgramDataTable $dataTable)
    {
        $title = 'Product Variant List';

        $data = [
            'title' => $title,
        ];

        return $dataTable->render("pages.admin.program.index", $data);
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

    public function destroy($programId)
    {
        Program::where('id', $programId)->delete();

        Alert::success('Success', 'Success Delete Program');
        return redirect()->route('admin.programs.index');
    }
}
