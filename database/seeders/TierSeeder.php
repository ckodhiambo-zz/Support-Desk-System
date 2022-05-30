<?php

namespace Database\Seeders;

use App\Models\Tier;
use Illuminate\Database\Seeder;

class TierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tier::firstorcreate([
            'tier_name' => 'Executive'
        ]);
        Tier::firstorcreate([
            'tier_name' => 'Tier-One'
        ]);
        Tier::firstorcreate([
            'tier_name' => 'Tier-Two'
        ]);
    }
}
