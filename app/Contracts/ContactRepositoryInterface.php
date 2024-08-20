<?php

namespace App\Contracts;

interface ContactRepositoryInterface
{
    public function getContact($contactId);
    public function deleteContact($contactId);
    public function getAllContacts();
    public function createContact($contactData);
    public function updateContact($contactUpdateData, $contact);
}
