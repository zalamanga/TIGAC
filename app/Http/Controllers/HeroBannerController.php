<?php

namespace App\Http\Controllers;

use App\DataTables\HeroBannerDataTable;
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

    public function destroy($heroBannerId)
    {
        $this->heroBannerService->deleteHeroBanner($heroBannerId);
        Alert::success('Success', 'Success Delete Hero Banner');
        return redirect()->route('admin.hero-banners.index');
    }
}
