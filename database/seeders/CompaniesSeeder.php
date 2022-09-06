<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{

    public function run()
    {

        Companies::firstorcreate([
            'company_name' => 'Centum Capital'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Centum Invstement Company Limited'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Centum Real Estate'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Greenblade Growers Limited'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Jafari Credit Limited'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Nabo Capital'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Pearl Marina'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Tier Data Limited'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Tribus SG'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Two Rivers Lifestyle Center'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Vipingo Development Limited'
        ]);
        Companies::firstorcreate([
            'company_name' => 'Zohari Leasing'
        ]);
    }
}
