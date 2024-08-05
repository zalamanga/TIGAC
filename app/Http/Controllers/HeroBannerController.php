<?php

namespace App\Http\Controllers;

use App\DataTables\HeroBannerDataTable;
use App\Http\Requests\HeroBannerRequest;
use App\Http\Requests\HeroBannerUpdateRequest;
use App\Services\HeroBannerService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HeroBannerController extends Controller
{
    protected $heroBannerService;

    public function __construct(HeroBannerService $heroBannerService)
    {
        $this->heroBannerService = $heroBannerService;
    }

    public function index(HeroBannerDataTable $dataTable)
    {
        $title = 'Hero Banner List';

        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.hero-banner.index", $data);
    }

    public function create()
    {
        $title = 'Add New Hero Banner';

        $data = [
            'title' => $title
        ];

        return view('pages.admin.hero-banner.create', $data);
    }

    public function store(HeroBannerRequest $request)
    {
        $heroBannerData = $request->validated();

        $this->heroBannerService->createHeroBanner($heroBannerData);

        Alert::success('Success', 'Success add new hero banner');
        return redirect()->route('admin.hero-banners.index');
    }

    public function edit($heroBannerId)
    {
        $title = 'Hero Banner Update';
        $heroBanner = $this->heroBannerService->getHeroBanner($heroBannerId);

        $data = [
            'title' => $title,
            'heroBanner' => $heroBanner
        ];

        return view('pages.admin.hero-banner.show', $data);
    }

    public function update(HeroBannerUpdateRequest $heroBannerUpdateRequest, $heroBannerId)
    {
        $heroBannerUpdateData = $heroBannerUpdateRequest->validated();

        $this->heroBannerService->updateHeroBanner($heroBannerUpdateData, $heroBannerId);
        Alert::success('Success', 'Success Edit Hero Banner');
        return redirect()->route('admin.hero-banners.index');
    }

    public function show($heroBannerId)
    {
        $title = 'Hero Banner Detail.';
        $heroBanner = $this->heroBannerService->getHeroBanner($heroBannerId);

        $data = [
            'title' => $title,
            'heroBanner' => $heroBanner
        ];

        return view("pages.admin.hero-banner.show", $data);
    }

    public function destroy($heroBannerId)
    {
        $this->heroBannerService->deleteHeroBanner($heroBannerId);
        Alert::success('Success', 'Success Delete Hero Banner');
        return redirect()->route('admin.hero-banners.index');
    }
}
