<?php

namespace App\Repositories;

use App\Contracts\MasterpieceRepositoryInterface;
use App\Models\Masterpiece;

class MasterpieceRepository implements MasterpieceRepositoryInterface
{
    public function getMasterpieceById($masterpieceId)
    {
        return Masterpiece::where('id', $masterpieceId)->first();
    }

    public function createMasterpiece($masterpieceRequestData)
    {
        return Masterpiece::create($masterpieceRequestData);
    }
    public function updateMasterpiece($masterpieceRequestUpdateData, $masterpiece)
    {
        return $masterpiece->update($masterpieceRequestUpdateData);
    }

    public function deleteMasterpiece($masterpieceId)
    {
        $masterpiece = $this->getMasterpieceById($masterpieceId);

        return $masterpiece->delete();
    }
}
