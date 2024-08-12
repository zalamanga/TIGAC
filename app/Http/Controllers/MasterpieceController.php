<?php

namespace App\Http\Controllers;

use App\DataTables\MasterpieceDataTable;
use App\Http\Requests\MasterpieceRequest;
use App\Services\MasterpieceService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterpieceController extends Controller
{
    protected $masterpieceService;

    public function __construct(MasterpieceService $masterpieceService = null)
    {
        $this->masterpieceService = $masterpieceService;
    }

    public function index(MasterpieceDataTable $dataTable)
    {
        $title = 'Masterpiece List';

        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.masterpiece.index", $data);
    }

    public function create()
    {
        $title = 'Add New Masterpiece List';

        $data = [
            'title' => $title
        ];

        return view("pages.admin.masterpiece.create", $data);
    }

    public function store(MasterpieceRequest $masterpieceRequest)
    {
        $masterpieceData = $masterpieceRequest->validated();

        $this->masterpieceService->createMasterpiece($masterpieceData);

        Alert::success('Success', 'Success create new category');
        return redirect()->route('admin.masterpieces.index');
    }
}
