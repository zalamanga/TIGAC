<?php

namespace App\Contracts;

interface VideoHomeBannerRepositoryInterface
{
    public function getVideoHomeBanners();
    public function getFirstVideoHomeBanner();
    public function getVideoHomeBannerById($videoHomeBannerId);
    public function createVideoHomeBanner($videoHomeBannerData);
    public function updateVideoHomeBanner($videoHomeBannerId, $videoHomeBannerData);
    public function deleteVideoHomeBanner($videoHomeBannerId);
}
