<?php

namespace App\Http\Controllers;

use App\DataTables\ContactDataTable;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index(ContactDataTable $dataTable)
    {
        $title = "TIGAC Contact List";

        $data = [
            'title' => $title
        ];

        return $dataTable->render('pages.admin.contact.index', $data);
    }

    public function create()
    {
        $title = "Add New Contact";

        $data = [
            'title' => $title
        ];

        return view('pages.admin.contact.create', $data);
    }

    public function store(ContactRequest $request)
    {
        $contactData = $request->validated();

        $this->contactService->createContact($contactData);

        Alert::success('Success', 'Success add new contact info');
        return redirect()->route('admin.contacts.index');
    }

    public function show($contactId)
    {
        $title = "Contact Detail";
        $contact = $this->contactService->getContact($contactId);

        $data = [
            'title' => $title,
            'contact' => $contact
        ];

        return view('pages.admin.contact.show', $data);
    }

    public function edit($contactId)
    {
        $title = "Contact Detail";
        $contact = $this->contactService->getContact($contactId);

        $data = [
            'title' => $title,
            'contact' => $contact
        ];

        return view('pages.admin.contact.show', $data);
    }

    public function update($contactId, ContactUpdateRequest $request)
    {
        $updateContactData = $request->validated();

        $contact = $this->contactService->getContact($contactId);

        $this->contactService->updateContact($contact, $updateContactData);

        Alert::success('Success', 'Success Edit Contact Info');
        return redirect()->route('admin.contacts.index');
    }

    public function destroy($contactId)
    {
        $this->contactService->deleteContact($contactId);
        Alert::success('Success', 'Success Delete Contact Information');
        return redirect()->route('admin.contacts.index');
    }
}
