<?php

namespace App\Services;

use App\Contracts\NewsletterRepositoryInterface;

class NewsletterService
{
    protected $newsletterRepositoryInterface;

    public function __construct(NewsletterRepositoryInterface $newsletterRepositoryInterface)
    {
        $this->newsletterRepositoryInterface = $newsletterRepositoryInterface;
    }

    public function getNewsletterById($newsletterId)
    {
        return $this->newsletterRepositoryInterface->getNewsletterById($newsletterId);
    }

    public function createNewsletter($reequestNewsletterData)
    {
        return $this->newsletterRepositoryInterface->createNewsletter($reequestNewsletterData);
    }
}
