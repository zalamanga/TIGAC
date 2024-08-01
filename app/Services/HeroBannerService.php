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
}
