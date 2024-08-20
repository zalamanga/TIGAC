<?php

namespace App\Contracts;

interface NewsletterRepositoryInterface
{
    public function getNewsletterById($newsletterId);
    public function getActiveNewsletters();
    public function createNewsletter($requestNewsletterData);
    public function updateNewsletter($newsletterId, $requestNewsletterUpdateData);
    public function deleteNewsletter($newsletterId);
}
