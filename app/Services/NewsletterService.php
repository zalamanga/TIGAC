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

    public function createNewsletter($requestNewsletterData)
    {
        $thumbnailPath = $requestNewsletterData['thumbnail']->store('images/newsletters', 'public');

        $newsletterData = [
            'title' => $requestNewsletterData['title'],
            'content' => $requestNewsletterData['content'],
            'thumbnail' => $thumbnailPath,
            'thumbnail_short_description' => $requestNewsletterData['thumbnail_short_description'],
        ];

        return $this->newsletterRepositoryInterface->createNewsletter($newsletterData);
    }
}
