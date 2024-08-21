<?php

namespace App\Services;

use App\Contracts\HeroBannerRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class HeroBannerService
{
    protected $heroBannerRepositoryInterface;

    public function __construct(HeroBannerRepositoryInterface $heroBannerRepositoryInterface)
    {
        $this->heroBannerRepositoryInterface = $heroBannerRepositoryInterface;
    }

    public function getActiveProductPageHeroBanners()
    {
        return $this->heroBannerRepositoryInterface->getActiveProductPageHeroBanners();
    }

    public function getHeroBanner($heroBannerId)
    {
        return $this->heroBannerRepositoryInterface->getHeroBanner($heroBannerId);
    }

    public function deleteHeroBanner($heroBannerId)
    {
        return $this->heroBannerRepositoryInterface->deleteHeroBanner($heroBannerId);
    }

    public function createHeroBanner($requestHeroBannerData)
    {
        $mediaPath = $requestHeroBannerData['media']->store();

        $heroBannerData = [
            'name' => $requestHeroBannerData['name'],
            'tagline' => $requestHeroBannerData['tagline'],
            'tagline_description' => $requestHeroBannerData['tagline_description'],
            'media_type' => $requestHeroBannerData['media']->getClientMimeType(),
            'media_path' => $mediaPath,
            'is_active' => $requestHeroBannerData['is_active'],
            'is_for_product_page' => $requestHeroBannerData['is_for_product_page'],
            'is_priority' => $requestHeroBannerData['is_priority'],
        ];

        return $this->heroBannerRepositoryInterface->createHeroBanner($heroBannerData);
    }

    public function updateHeroBanner($heroBannerData, $heroBannerId)
    {
        $heroBanner = $this->getHeroBanner($heroBannerId);

        // handle image input
        if (array_key_exists('media', $heroBannerData)) {
            if (Storage::disk('public')->exists($heroBanner->media_path)) {
                Storage::disk('public')->delete($heroBanner->media_path);
            }

            $newMediaPath = $heroBannerData['media']->store();

            $heroBannerData = [
                'name' => $heroBannerData['name'],
                'tagline' => $heroBannerData['tagline'],
                'tagline_description' => $heroBannerData['tagline_description'],
                'media_type' => $heroBannerData['media']->getClientMimeType(),
                'media_path' => $newMediaPath,
                'is_active' => $heroBannerData['is_active'],
                'is_for_product_page' => $heroBannerData['is_for_product_page'],
                'is_priority' => $heroBannerData['is_priority'],
            ];
        } else {
            $heroBannerData = [
                'name' => $heroBannerData['name'],
                'tagline' => $heroBannerData['tagline'],
                'tagline_description' => $heroBannerData['tagline_description'],
                'is_active' => $heroBannerData['is_active'],
                'is_for_product_page' => $heroBannerData['is_for_product_page'],
                'is_priority' => $heroBannerData['is_priority'],
            ];
        }

        return $this->heroBannerRepositoryInterface->updateHeroBanner($heroBannerData, $heroBanner);
    }
}
