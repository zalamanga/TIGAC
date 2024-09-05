<?php

namespace App\Services;

use App\Contracts\PartnershipRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class PartnershipService
{
    protected $partnershipRepositoryInterface;

    public function __construct(PartnershipRepositoryInterface $partnershipRepositoryInterface)
    {
        $this->partnershipRepositoryInterface = $partnershipRepositoryInterface;
    }

    public function getPartnership($partnershipId)
    {
        return $this->partnershipRepositoryInterface->getPartnership($partnershipId);
    }

    public function getAllPartnerships()
    {
        return $this->partnershipRepositoryInterface->getAllPartnerships();
    }

    public function createPartnership($requestPartnershipData)
    {
        $logoPath = $requestPartnershipData['logo']->store('partnership');

        $partnershipData = [
            'name' => $requestPartnershipData['name'],
            'description' => $requestPartnershipData['description'],
            'logo' => $logoPath,
            'is_active' => $requestPartnershipData['is_active'],
            'external_link' => $requestPartnershipData['external_link'],
        ];

        return $this->partnershipRepositoryInterface->createPartnership($partnershipData);
    }

    public function updatePartnership($partnershipId, $partnershipUpdateData)
    {
        $partnership = $this->getPartnership($partnershipId);

        // handle image input
        if (array_key_exists('logo', $partnershipUpdateData)) {
            if (Storage::disk('public')->exists($partnership->logo)) {
                Storage::disk('public')->delete($partnership->logo);
            }

            $newLogoPath = $partnershipUpdateData['logo']->store();

            $partnershipData = [
                'name' => $partnershipUpdateData['name'],
                'description' => $partnershipUpdateData['description'],
                'logo' => $newLogoPath,
                'is_active' => $partnershipUpdateData['is_active'],
                'external_link' => $partnershipUpdateData['external_link'],

            ];
        } else {
            $partnershipData = [
                'name' => $partnershipUpdateData['name'],
                'description' => $partnershipUpdateData['description'],
                'is_active' => $partnershipUpdateData['is_active'],
                'external_link' => $partnershipUpdateData['external_link'],
            ];
        }

        return $this->partnershipRepositoryInterface->updatePartnership($partnershipData, $partnership);
    }

    public function deletePartnership($partnershipId)
    {
        $partnership = $this->getPartnership($partnershipId);

        if (Storage::disk('public')->exists($partnership->logo)) {
            Storage::disk('public')->delete($partnership->logo);
        }

        return $this->partnershipRepositoryInterface->deletePartnership($partnership);
    }
}
