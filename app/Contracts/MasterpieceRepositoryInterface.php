<?php

namespace App\Contracts;

interface MasterpieceRepositoryInterface
{
    public function getMasterpieceById($masterpieceId);
    public function getActiveMasterpiece();
    public function createMasterpiece($masterpieceRequestData);
    public function updateMasterpiece($masterpieceRequestUpdateData, $masterpiece);
    public function deleteMasterpiece($masterpiece);
}
