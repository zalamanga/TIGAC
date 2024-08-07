<?php

namespace App\Http\Controllers;

use App\DataTables\NewsletterDataTable;
use App\Http\Requests\NewsletterRequest;
use App\Services\NewsletterService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NewsletterController extends Controller
{
    protected $newsletterService;

    public function __construct(NewsletterService $newsletterService)
    {
        $this->newsletterService = $newsletterService;
    }

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

    public function store(NewsletterRequest $newsletterRequest)
    {
        $newsletterData = $newsletterRequest->validated();

        $this->newsletterService->createNewsletter($newsletterData);

        Alert::success('Success', 'Success create new category');
        return redirect()->route('admin.newsletters.index');
    }

    public function edit($newsletterId)
    {
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
