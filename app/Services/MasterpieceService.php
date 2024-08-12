<?php

namespace App\Services;

use App\Contracts\MasterpieceRepositoryInterface;

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
        $thumbnailPath = $masterpieceRequestData['thumbnail']->store('images/products', 'public');

        $masterpieceData = [
            'name' => $masterpieceRequestData['name'],
            'detail_link' => $masterpieceRequestData['detail_link'],
            'thumbnail' => $thumbnailPath,
            'thumbnail_short_description' => $masterpieceRequestData['thumbnail_short_description'],
            'is_active' => $masterpieceRequestData['is_active'],
        ];

        return $this->masterpieceRepositoryInterface->createMasterpiece($masterpieceData);
    }
}
