<?php

namespace App\Http\Controllers;

use App\DataTables\HeroBannerDataTable;
use Illuminate\Http\Request;

class HeroBannerController extends Controller
{
    public function index(HeroBannerDataTable $dataTable)
    {
        $title = 'Hero Banner List';

        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.hero-banner.index", $data);
    }
}
