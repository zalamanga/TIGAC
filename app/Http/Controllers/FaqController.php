<?php

namespace App\Http\Controllers;

use App\DataTables\FaqDataTable;
use App\Http\Requests\FaqRequest;
use App\Http\Requests\FaqUpdateRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    public function frontEndPage()
    {
        $faqs = Faq::get();

        $data = [
            "faqs" => $faqs
        ];

        return view('pages.frontend.faq', $data);
    }

    public function index(FaqDataTable $dataTable)
    {
        $title = "Faq List";

        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.faq.index", $data);
    }

    public function create()
    {
        $title = 'Add New Faq';

        $data = [
            'title' => $title
        ];

        return view('pages.admin.faq.create', $data);
    }

    public function store(FaqRequest $request)
    {
        $faqData = $request->validated();

        Faq::create($faqData);

        Alert::success('Success', 'Success add new Faq');
        return redirect()->route('admin.faqs.index');
    }

    public function edit($faqId)
    {
        $title = 'Edit Faq';
        $faq = Faq::where('id', $faqId)->first();

        $data = [
            'title' => $title,
            'faq' => $faq
        ];

        return view('pages.admin.faq.show', $data);
    }

    public function update($faqId, FaqUpdateRequest $request)
    {
        $faq = Faq::where('id', $faqId)->first();

        $faqUpdateData = $request->validated();

        $faq->update($faqUpdateData);

        Alert::success('Success', 'Success update Faq');
        return redirect()->route('admin.faqs.index');
    }

    public function show($faqId)
    {
        $title = 'Detail Faq';
        $faq = Faq::where('id', $faqId)->first();

        $data = [
            'title' => $title,
            'faq' => $faq
        ];

        return view('pages.admin.faq.show', $data);
    }

    public function destroy($faqId)
    {
        Faq::where('id', $faqId)->delete();

        Alert::success('Success', 'Success delete Faq');
        return redirect()->route('admin.faqs.index');
    }
}
