<?php

namespace App\Repositories;

use App\Contracts\NewsletterRepositoryInterface;
use App\Models\Newsletter;

class NewsletterRepository implements NewsletterRepositoryInterface
{
    public function getNewsletterById($newsletterId)
    {
        return Newsletter::where('id', $newsletterId)->first();
    }

    public function createNewsletter($requestNewsletterData)
    {
        return Newsletter::create($requestNewsletterData);
    }

    public function deleteNewsletter($newsletterId)
    {
        $newsletter = $this->getNewsletterById($newsletterId);

        return $newsletter->delete();
    }
}
