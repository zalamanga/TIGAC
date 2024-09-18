<?php

namespace App\Http\Controllers;

use App\Services\MasterpieceService;
use App\Services\VideoHomeBannerService;
use Illuminate\Http\Request;

class HomePageController
{
    protected $masterpieceService;
    protected $videoHomeBannerService;

    public function __construct(MasterpieceService $masterpieceService, VideoHomeBannerService $videoHomeBannerService)
    {
        $this->masterpieceService = $masterpieceService;
        $this->videoHomeBannerService = $videoHomeBannerService;
    }

    public function index()
    {
        $masterpieceBanners = $this->masterpieceService->getActiveMasterpiece();
        $videoHomeBanner = $this->videoHomeBannerService->getFirstVideoHomeBanner();

        $data = [
            'masterpieceBanners' => $masterpieceBanners,
            'videoHomeBanner' => $videoHomeBanner
        ];

        return view('pages.frontend.index', $data);
    }
}
