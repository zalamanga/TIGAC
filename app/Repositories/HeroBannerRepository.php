<?php

namespace App\Repositories;

use App\Contracts\HeroBannerRepositoryInterface;
use App\Models\HeroBanner;
use Illuminate\Support\Facades\Storage;

class HeroBannerRepository implements HeroBannerRepositoryInterface
{
    public function getHeroBanner($heroBannerId)
    {
        return HeroBanner::where('id', $heroBannerId)->first();
    }

    public function deleteHeroBanner($heroBannerId)
    {
        $heroBanner = $this->getHeroBanner($heroBannerId);

        if (Storage::disk('public')->exists($heroBanner->media_path)) {
            Storage::disk('public')->delete($heroBanner->media_path);
        }

        return $heroBanner->delete();
    }
}
