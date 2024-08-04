<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    protected static ?string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin TigaC',
            'email' => 'admin@gmail.com',
            'password' => static::$password ??= Hash::make('admin123'),
        ]);

        $this->call([
            ProductCategorySeeder::class,
            VariantSeeder::class,
            ProductSeeder::class,
            HeroBannerSeeder::class
        ]);
    }
}
