<?php

namespace App\Http\Controllers;

use App\DataTables\NewsletterDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsletterController extends Controller
{
    public function index(NewsletterDataTable $dataTable)
    {
        $title = "Newsletters";
        $data = [
            'title' => $title,
        ];

        return $dataTable->render('pages.admin.newsletter.index', $data);
    }

    public function create()
    {
        $title = "Create New Newsletter";

        return view('pages.admin.newsletter.create', [
            'title' => $title
        ]);
    }

    public function edit($newsletterId)
    {
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function update($newsletterId, Request $request)
    {
    }

    public function destroy($newsletterId)
    {
    }

    public function newsletterUploadImage(Request $request)
    {
        $imgpath = $request->file('file')->store('post', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
