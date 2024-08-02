<?php

namespace App\Contracts;

interface HeroBannerRepositoryInterface
{
    public function getHeroBanner($heroBannerId);
    public function deleteHeroBanner($heroBannerId);
    public function createHeroBanner($heroBannerData);
    public function updateHeroBanner($heroBannerUpdateData, $heroBannerId);
}
