<?php

namespace App\Http\Controllers;

use App\Services\MasterpieceService;

class HomePageController
{
    protected $masterpieceService;

    public function __construct(MasterpieceService $masterpieceService)
    {
        $this->masterpieceService = $masterpieceService;
    }

    public function index()
    {
        $masterpieceBanners = $this->masterpieceService->getActiveMasterpiece();

        $data = [
            'masterpieceBanners' => $masterpieceBanners
        ];

        return view('pages.frontend.index', $data);
    }
}
