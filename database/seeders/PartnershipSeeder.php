<?php

namespace Database\Seeders;

use App\Models\Partnership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageBaseUrl = 'images/partnership_logo/';

        $partnerships = [
            [
                'name' => 'logo-vb',
                'logo' => $imageBaseUrl . 'logo-vb.png',
                'description' => 'logo-vb',
                'is_active' => '1',
                'external_link' => '#logo-vb',
            ],
            [
                'name' => 'logo-vapeboss',
                'logo' => $imageBaseUrl . 'logo-vapeboss.png',
                'description' => 'logo-vapeboss',
                'is_active' => '1',
                'external_link' => '#logo-vapeboss',
            ],
            [
                'name' => 'logo-ejvape',
                'logo' => $imageBaseUrl . 'logo-ejvape.png',
                'description' => 'logo-ejvape',
                'is_active' => '1',
                'external_link' => '#logo-ejvape',
            ],
            [
                'name' => 'logo-vapeon',
                'logo' => $imageBaseUrl . 'logo-vapeon.png',
                'description' => 'logo-vapeon',
                'is_active' => '1',
                'external_link' => '#logo-vapeon',
            ],
            [
                'name' => 'logo-tom',
                'logo' => $imageBaseUrl . 'logo-tom.png',
                'description' => 'logo-tom',
                'is_active' => '1',
                'external_link' => '#logo-tom',
            ],
            [
                'name' => 'logo-vb2',
                'logo' => $imageBaseUrl . 'logo-vb2.png',
                'description' => 'logo-vb2',
                'is_active' => '1',
                'external_link' => '#logo-vb2',
            ],
            [
                'name' => 'logo-cmw',
                'logo' => $imageBaseUrl . 'logo-cmw.png',
                'description' => 'logo-cmw',
                'is_active' => '1',
                'external_link' => '#logo-cmw',
            ],
            [
                'name' => 'logo-vaporking',
                'logo' => $imageBaseUrl . 'logo-vaporking.png',
                'description' => 'logo-vaporking',
                'is_active' => '1',
                'external_link' => '#logo-vaporking',
            ],
            [
                'name' => 'logo-cloudvaping',
                'logo' => $imageBaseUrl . 'logo-cloudvaping.png',
                'description' => 'logo-cloudvaping',
                'is_active' => '1',
                'external_link' => '#logo-cloudvaping',
            ],

        ];

        foreach ($partnerships as $partnership) {
            Partnership::create($partnership);
        }
    }
}
