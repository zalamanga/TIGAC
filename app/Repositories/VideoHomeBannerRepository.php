<?php

namespace App\Repositories;

use App\Contracts\VideoHomeBannerRepositoryInterface;
use App\Models\VideoHomeBanner;

class VideoHomeBannerRepository implements VideoHomeBannerRepositoryInterface
{
    public function getVideoHomeBanners()
    {
        return VideoHomeBanner::get();
    }

    public function getVideoHomeBannerById($videoHomeBannerId)
    {
        return VideoHomeBanner::where('id', $videoHomeBannerId)->first();
    }
    public function createVideoHomeBanner($videoHomeBannerData)
    {
        return VideoHomeBanner::create($videoHomeBannerData);
    }

    public function updateVideoHomeBanner($videoHomeBanner, $videoHomeBannerData)
    {
        return $videoHomeBanner->update($videoHomeBannerData);
    }

    public function deleteVideoHomeBanner($videoHomeBannerId)
    {
        $videoHomeBanner = $this->getVideoHomeBannerById($videoHomeBannerId);

        return $videoHomeBanner->delete();
    }

    public function getFirstVideoHomeBanner()
    {
        return VideoHomeBanner::first();
    }
}
