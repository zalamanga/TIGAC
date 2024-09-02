<?php

namespace App\Services;

use App\Contracts\VideoHomeBannerRepositoryInterface;

class VideoHomeBannerService
{
    protected $videoHomeBannerRepositoryInterface;

    public function __construct(VideoHomeBannerRepositoryInterface $videoHomeBannerRepositoryInterface)
    {
        $this->videoHomeBannerRepositoryInterface = $videoHomeBannerRepositoryInterface;
    }

    public function createVideoHomeBanner($requestVideoHomeBannerData)
    {
        if (array_key_exists('video', $requestVideoHomeBannerData)) {
            $videoPath = $requestVideoHomeBannerData['video']->store();

            $videoHomeBannerData = [
                "name" => $requestVideoHomeBannerData['name'],
                "description" => $requestVideoHomeBannerData['description'],
                "video_path" => $videoPath
            ];
        }

        return $this->videoHomeBannerRepositoryInterface->createVideoHomeBanner($videoHomeBannerData);
    }

    public function getVideoHomeBannerById($videoHomeBannerId)
    {
        return $this->videoHomeBannerRepositoryInterface->getVideoHomeBannerById($videoHomeBannerId);
    }

    public function updateVideoHomeBanner($videoHomeBannerId, $requestVideoHomeBannerData)
    {
        $videoHomeBanner = $this->getVideoHomeBannerById($videoHomeBannerId);

        if (array_key_exists('video', $requestVideoHomeBannerData)) {
            $videoPath = $requestVideoHomeBannerData['video']->store();

            $videoHomeBannerData = [
                "name" => $requestVideoHomeBannerData['name'],
                "description" => $requestVideoHomeBannerData['description'],
                "video_path" => $videoPath
            ];
        } else {
            $videoHomeBannerData = [
                "name" => $requestVideoHomeBannerData['name'],
                "description" => $requestVideoHomeBannerData['description'],
            ];
        }

        return $this->videoHomeBannerRepositoryInterface->updateVideoHomeBanner($videoHomeBanner, $videoHomeBannerData);
    }

    public function deleteVideoHomeBanner($videoHomeBannerId)
    {
        return $this->videoHomeBannerRepositoryInterface->deleteVideoHomeBanner($videoHomeBannerId);
    }
}
