<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            VideoHomeBannerSeeder::class,
            PartnershipSeeder::class,
            NewsletterSeeder::class,
            MasterpieceSeeder::class,
            ProductCategorySeeder::class,
            VariantSeeder::class,
            ProductSeeder::class,
            HeroBannerSeeder::class,
        ]);
    }
}
