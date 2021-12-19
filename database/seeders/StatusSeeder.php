<?php

namespace Database\Seeders;

use App\Models\status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{

    public function run()
    {
        status::firstorcreate([
            'name' => 'New'
        ]);
        status::firstorcreate([
            'name' => 'Open'
        ]);
        status::firstorcreate([
            'name' => 'Pending'
        ]);
        status::firstorcreate([
            'name' => 'Solved'
        ]);
        status::firstorcreate([
            'name' => 'On-Hold'
        ]);
        status::firstorcreate([
            'name' => 'Closed'
        ]);
        status::firstorcreate([
            'name' => 'Cancelled'
        ]);
        status::firstorcreate([
            'name' => 'Archived'
        ]);
    }
}
