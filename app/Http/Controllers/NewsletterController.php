<?php

namespace App\Http\Controllers;

use App\DataTables\NewsletterDataTable;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(NewsletterDataTable $dataTable)
    {
        $title = "Newsletters";
        $data = [
            'title' => $title,
        ];

        return $dataTable->render('pages.admin.newslatter.index', $data);
    }

    public function edit($newsletterId)
    {
    }

    public function store(Request $request)
    {
    }

    public function update($newsletterId, Request $request)
    {
    }

    public function destroy($newsletterId)
    {
    }
}
