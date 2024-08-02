<?php

namespace App\Services;

use App\Contracts\HeroBannerRepositoryInterface;

class HeroBannerService
{
    protected $heroBannerRepositoryInterface;

    public function __construct(HeroBannerRepositoryInterface $heroBannerRepositoryInterface)
    {
        $this->heroBannerRepositoryInterface = $heroBannerRepositoryInterface;
    }

    public function deleteHeroBanner($heroBannerId)
    {
        return $this->heroBannerRepositoryInterface->deleteHeroBanner($heroBannerId);
    }

    public function createHeroBanner($requestHeroBannerData)
    {
        $mediaPath = $requestHeroBannerData['media']->store('images/products', 'public');

        $heroBannerData = [
            'name' => $requestHeroBannerData['name'],
            'tagline' => $requestHeroBannerData['tagline'],
            'tagline_description' => $requestHeroBannerData['tagline_description'],
            'media_type' => $requestHeroBannerData['media']->getClientMimeType(),
            'media_path' => $mediaPath,
            'is_active' => $requestHeroBannerData['is_active'],
            'is_priority' => $requestHeroBannerData['is_priority'],
        ];

        return $this->heroBannerRepositoryInterface->createHeroBanner($heroBannerData);
    }
}
