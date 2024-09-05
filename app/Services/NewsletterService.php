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

    public function getActiveNewsletters()
    {
        return $this->newsletterRepositoryInterface->getActiveNewsletters();
    }

    public function createNewsletter($requestNewsletterData)
    {
        $thumbnailPath = $requestNewsletterData['thumbnail']->store('newsletter');

        $newsletterData = [
            'title' => $requestNewsletterData['title'],
            'content' => $requestNewsletterData['content'],
            'thumbnail' => $thumbnailPath,
            'thumbnail_short_description' => $requestNewsletterData['thumbnail_short_description'],
        ];

        return $this->newsletterRepositoryInterface->createNewsletter($newsletterData);
    }

    public function updateNewsletter($newsletterId, $newsletterUpdateData)
    {
        $newsletter = $this->getNewsletterById($newsletterId);

        // Handle image in newsletter content
        preg_match_all('/<img[^>]+src="([^">]+)"/', $newsletter->content, $oldImageContents);
        $oldImagePaths = $oldImageContents[1];

        preg_match_all('/<img[^>]+src="([^">]+)"/', $newsletterUpdateData['content'], $newImageContents);
        $newImagePaths = $newImageContents[1];

        $imagesToDelete = array_diff($oldImagePaths, $newImagePaths);

        foreach ($imagesToDelete as $imagePath) {
            $relativeImagePath = str_replace('/storage/', '', $imagePath);

            if (Storage::exists($relativeImagePath)) {
                Storage::delete($relativeImagePath);
            }
        }

        // Handle thumbnail image
        if (array_key_exists('thumbnail', $newsletterUpdateData)) {
            if (Storage::disk('public')->exists($newsletter->thumbnail)) {
                Storage::disk('public')->delete($newsletter->thumbnail);
            }

            $newMediaPath = $newsletterUpdateData['thumbnail']->store();

            // Composer newsletter data
            $newsletterData = [
                'title' => $newsletterUpdateData['title'],
                'content' => $newsletterUpdateData['content'],
                'thumbnail' => $newMediaPath,
                'thumbnail_short_description' => $newsletterUpdateData['thumbnail_short_description'],
            ];
        } else {
            $newsletterData = [
                'title' => $newsletterUpdateData['title'],
                'content' => $newsletterUpdateData['content'],
                'thumbnail_short_description' => $newsletterUpdateData['thumbnail_short_description'],
            ];
        }

        return $this->newsletterRepositoryInterface->updateNewsletter($newsletter, $newsletterData);
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
