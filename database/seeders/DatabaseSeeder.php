<?php

namespace Database\Seeders;

use App\Models\AssetType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([

            CompaniesSeeder::class,
            AssetsSeeder::class,
            IncidentSeeder::class,
            CategorySeeder::class,
            StatusSeeder::class,
            ChannelSeeder::class
        ]);
    }
}
