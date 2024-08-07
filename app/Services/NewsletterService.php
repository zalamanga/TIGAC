<?php

namespace App\Services;

use App\Contracts\NewsletterRepositoryInterface;
use Illuminate\Support\Facades\Storage;

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

    public function deleteNewsletter($newsletterId)
    {
        $newsletter = $this->getNewsletterById($newsletterId);

        if (Storage::disk('public')->exists($newsletter->thumbnail)) {
            Storage::disk('public')->delete($newsletter->thumbnail);
        }

        // handle images in newsletter content
        preg_match_all('/<img[^>]+src="([^">]+)"/', $newsletter->content, $imageContents);

        $imagePaths = $imageContents[1];

        foreach ($imagePaths as $imagePath) {
            $relativeImagePath = str_replace('/storage/', '', $imagePath);

            if (Storage::disk('public')->exists($relativeImagePath)) {
                Storage::disk('public')->delete($relativeImagePath);
            }
        }

        return $this->newsletterRepositoryInterface->deleteNewsletter($newsletterId);
    }
}
