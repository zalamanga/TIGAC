<?php

namespace App\Http\Controllers;

use App\DataTables\NewsletterDataTable;
use App\Http\Requests\NewsletterRequest;
use App\Http\Requests\NewsletterUpdateRequest;
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

    public function show($newsletterId)
    {
        $title = "Newsletter Detail";
        $newsletter = $this->newsletterService->getNewsletterById($newsletterId);

        return view('pages.admin.newsletter.show', [
            'title' => $title,
            'newsletter' => $newsletter
        ]);
    }

    public function edit($newsletterId)
    {
        $title = "Newsletter Detail";
        $newsletter = $this->newsletterService->getNewsletterById($newsletterId);

        return view('pages.admin.newsletter.show', [
            'title' => $title,
            'newsletter' => $newsletter
        ]);
    }

    public function update($newsletterId, NewsletterUpdateRequest $newsletterUpdateRequest)
    {
        $newsletterRequestValidated = $newsletterUpdateRequest->validated();

        $this->newsletterService->updateNewsletter($newsletterId, $newsletterRequestValidated);
        Alert::success('Success', 'Success Edit Newsletter');
        return redirect()->route('admin.newsletters.index');
    }

    public function destroy($newsletterId)
    {
        $this->newsletterService->deleteNewsletter($newsletterId);

        Alert::success('Success', 'Success delete newsletter');
        return redirect()->route('admin.newsletters.index');
    }

    public function newsletterUploadImage(Request $request)
    {
        $imgpath = $request->file('file')->store('images/newsletter_contents', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
