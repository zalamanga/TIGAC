<?php

namespace App\Contracts;

interface PartnershipRepositoryInterface
{
    public function getPartnership($partnershipId);
    public function getAllPartnerships();
    public function deletePartnership($partnershipId);
    public function createPartnership($partnershipData);
    public function updatePartnership($partnershipUpdateData, $partnershipId);
}
