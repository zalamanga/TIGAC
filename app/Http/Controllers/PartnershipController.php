<?php

namespace App\Http\Controllers;

use App\DataTables\PartnershipDataTable;
use App\Http\Requests\PartnershipRequest;
use App\Http\Requests\PartnershipUpdateRequest;
use App\Services\PartnershipService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PartnershipController extends Controller
{
    protected $partnershipService;

    public function __construct(PartnershipService $partnershipService)
    {
        $this->partnershipService = $partnershipService;
    }

    public function index(PartnershipDataTable $dataTable)
    {
        $title = 'Partnership List';

        $data = [
            'title' => $title
        ];

        return $dataTable->render('pages.admin.partnership.index', $data);
    }

    public function frontEndPage()
    {
        $partnerships = $this->partnershipService->getAllPartnerships();

        $data = [
            'partnerships' => $partnerships
        ];

        return view('pages.frontend.partnership', $data);
    }

    public function create()
    {
        $title = 'Add New Partnership';

        $data = [
            'title' => $title
        ];

        return view('pages.admin.partnership.create', $data);
    }

    public function store(PartnershipRequest $request)
    {
        $partnershipData = $request->validated();

        $this->partnershipService->createPartnership($partnershipData);

        Alert::success('Success', 'Success add new partnership');
        return redirect()->route('admin.partnerships.index');
    }

    public function show($partnershipId)
    {
        $title = 'Partnership Detail.';
        $partnership = $this->partnershipService->getPartnership($partnershipId);

        $data = [
            'title' => $title,
            'partnership' => $partnership
        ];

        return view("pages.admin.partnership.show", $data);
    }

    public function edit($partnershipId)
    {
        $title = 'Edit Partnership Data';
        $partnership = $this->partnershipService->getPartnership($partnershipId);

        $data = [
            'title' => $title,
            'partnership' => $partnership
        ];

        return view("pages.admin.partnership.show", $data);
    }
    public function update($partnershipId, PartnershipUpdateRequest $request)
    {
        $partnershiUpdateData = $request->validated();

        $this->partnershipService->updatePartnership($partnershipId, $partnershiUpdateData);
        Alert::success('Success', 'Success Delete Partnership');
        return redirect()->route('admin.partnerships.index');
    }


    public function destroy($partnershipId)
    {
        $this->partnershipService->deletePartnership($partnershipId);
        Alert::success('Success', 'Success Delete Partnership');
        return redirect()->route('admin.partnerships.index');
    }
}
