<?php

namespace App\Services;

use App\Contracts\MasterpieceRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class MasterpieceService
{
    protected $masterpieceRepositoryInterface;

    public function __construct(MasterpieceRepositoryInterface $masterpieceRepositoryInterface)
    {
        $this->masterpieceRepositoryInterface = $masterpieceRepositoryInterface;
    }

    public function getMasterpieceById($masterpieceId)
    {
        return $this->masterpieceRepositoryInterface->getMasterpieceById($masterpieceId);
    }

    public function createMasterpiece($masterpieceRequestData)
    {
        $thumbnailPath = $masterpieceRequestData['thumbnail']->store();

        $masterpieceData = [
            'name' => $masterpieceRequestData['name'],
            'detail_link' => $masterpieceRequestData['detail_link'],
            'thumbnail' => $thumbnailPath,
            'thumbnail_short_description' => $masterpieceRequestData['thumbnail_short_description'],
            'is_active' => $masterpieceRequestData['is_active'],
        ];

        return $this->masterpieceRepositoryInterface->createMasterpiece($masterpieceData);
    }

    public function updateMasterpiece($masterpieceUpdateData, $masterpiece)
    {
        if (array_key_exists('thumbnail', $masterpieceUpdateData)) {
            if (Storage::disk('public')->exists($masterpiece->thumbnail)) {
                Storage::disk('public')->delete($masterpiece->thumbnail);
            }

            $newThumbnailPath = $masterpieceUpdateData['thumbnail']->store('masterpiece');

            $masterpieceData = [
                'name' => $masterpieceUpdateData['name'],
                'detail_link' => $masterpieceUpdateData['detail_link'],
                'thumbnail' => $newThumbnailPath,
                'thumbnail_short_description' => $masterpieceUpdateData['thumbnail_short_description'],
                'is_active' => $masterpieceUpdateData['is_active'],
            ];
        } else {
            $masterpieceData = [
                'name' => $masterpieceUpdateData['name'],
                'detail_link' => $masterpieceUpdateData['detail_link'],
                'thumbnail_short_desmasterpieceUpdateDatacription' => $masterpieceUpdateData['thumbnail_short_description'],
                'is_active' => $masterpieceUpdateData['is_active'],
            ];
        }

        return $this->masterpieceRepositoryInterface->updateMasterpiece($masterpieceData, $masterpiece);
    }

    public function deleteMasterpiece($masterpieceId)
    {
        return $this->masterpieceRepositoryInterface->deleteMasterpiece($masterpieceId);
    }

    public function getActiveMasterpiece()
    {
        return $this->masterpieceRepositoryInterface->getActiveMasterpiece();
    }
}
