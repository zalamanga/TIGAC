<?php

namespace App\Http\Controllers;

use App\DataTables\VideoHomeBannerDataTable;
use App\Http\Requests\VideoHomeBannerRequest;
use App\Services\VideoHomeBannerService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VideoHomeBannerController extends Controller
{
    protected $videoHomeBannerService;

    public function __construct(VideoHomeBannerService $videoHomeBannerService)
    {
        $this->videoHomeBannerService = $videoHomeBannerService;
    }

    public function index(VideoHomeBannerDataTable $dataTable)
    {
        $title = 'Video Home Banner List';

        $data = [
            'title' => $title,
        ];

        return $dataTable->render("pages.admin.video-home-banner.index", $data);
    }

    public function create()
    {
        $title = 'Create New Video Home Banner';

        $data = [
            'title' => $title,
        ];

        return view('pages.admin.video-home-banner.create', $data);
    }

    public function store(VideoHomeBannerRequest $request)
    {
        $videoHomeBannerData = $request->validated();

        $this->videoHomeBannerService->createVideoHomeBanner($videoHomeBannerData);

        Alert::success('Success', 'Success Add New Video Banner');
        return redirect()->route('admin.video-home-banners.index');
    }

    public function show($videoHomeBannerId)
    {
        $title = 'Hero Banner Detail.';
        $videoHomeBanner = $this->videoHomeBannerService->getVideoHomeBannerById($videoHomeBannerId);

        $data = [
            'title' => $title,
            'videoHomeBanner' => $videoHomeBanner
        ];

        return view("pages.admin.video-home-banner.show", $data);
    }

    public function edit($videoHomeBannerId)
    {
        $title = 'Hero Banner Detail.';
        $videoHomeBanner = $this->videoHomeBannerService->getVideoHomeBannerById($videoHomeBannerId);

        $data = [
            'title' => $title,
            'videoHomeBanner' => $videoHomeBanner
        ];

        return view("pages.admin.video-home-banner.show", $data);
    }

    public function update($videoHomeBannerId, VideoHomeBannerRequest $request)
    {
        $videoHomeBannerData = $request->validated();

        $this->videoHomeBannerService->updateVideoHomeBanner($videoHomeBannerId, $videoHomeBannerData);

        Alert::success('Success', 'Success Edit New Video Banner');
        return redirect()->route('admin.video-home-banners.index');
    }

    public function destroy($videoHomeBannerId)
    {
        $this->videoHomeBannerService->deleteVideoHomeBanner($videoHomeBannerId);

        Alert::success('Success', 'Success Delete New Video Banner');
        return redirect()->route('admin.video-home-banners.index');
    }
}
