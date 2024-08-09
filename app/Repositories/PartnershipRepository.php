<?php

namespace App\Repositories;

use App\Contracts\PartnershipRepositoryInterface;
use App\Models\Partnership;

class PartnershipRepository implements PartnershipRepositoryInterface
{
    public function getPartnership($partnershipId)
    {
        return Partnership::where('id', $partnershipId)->first();
    }
    public function deletePartnership($partnership)
    {
        return $partnership->delete();
    }
    public function createPartnership($partnershipData)
    {
        return Partnership::create($partnershipData);
    }
    public function updatePartnership($partnershipUpdateData, $partnershipId) {}
}
