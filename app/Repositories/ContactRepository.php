<?php

namespace App\Repositories;

use App\Contracts\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function getContact($contactId)
    {
        return Contact::where('id', $contactId)->first();
    }
    public function deleteContact($contactId)
    {
        $contact = $this->getContact($contactId);

        return $contact->delete();
    }
    public function createContact($contactData)
    {
        return Contact::create($contactData);
    }
    public function updateContact($contactUpdateData, $contact)
    {
        return $contact->update($contactUpdateData);
    }
}
