<?php

namespace App\Contracts;

interface NewsletterRepositoryInterface
{
    public function getNewsletterById($newsletterId);
    public function createNewsletter($requestNewsletterData);
}
