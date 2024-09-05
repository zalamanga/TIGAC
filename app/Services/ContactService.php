<?php

namespace App\Services;

use App\Contracts\ContactRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ContactService
{
    protected $contactRepositoryInterface;

    public function __construct(ContactRepositoryInterface $contactRepositoryInterface)
    {
        $this->contactRepositoryInterface = $contactRepositoryInterface;
    }

    public function getContact($contactId)
    {
        return $this->contactRepositoryInterface->getContact($contactId);
    }

    public function getAllContacts()
    {
        return $this->contactRepositoryInterface->getAllContacts();
    }

    public function createContact($requestContactData)
    {
        $logoPath = $requestContactData['logo']->store('contact');

        $contactData = [
            'name' => $requestContactData['name'],
            'link' => $requestContactData['link'],
            'logo' => $logoPath,
        ];

        return $this->contactRepositoryInterface->createContact($contactData);
    }

    public function updateContact($contactId, $requestUpdateContact)
    {
        $contact = $this->getContact($contactId->id);
        if (array_key_exists('logo', $requestUpdateContact)) {
            if (Storage::disk('public')->exists($contact->logo)) {
                Storage::disk('public')->delete($contact->logo);
            }

            $newLogoPath = $requestUpdateContact['logo']->store();

            $updateContactData = [
                'name' => $requestUpdateContact['name'],
                'link' => $requestUpdateContact['link'],
                'logo' => $newLogoPath,
            ];
        } else {
            $updateContactData = [
                'name' => $requestUpdateContact['name'],
                'link' => $requestUpdateContact['link'],
            ];
        }

        return $this->contactRepositoryInterface->updateContact($updateContactData, $contact);
    }

    public function deleteContact($contactId)
    {
        return $this->contactRepositoryInterface->deleteContact($contactId);
    }
}
