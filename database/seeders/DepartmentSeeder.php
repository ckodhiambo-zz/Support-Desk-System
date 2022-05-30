<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{

    public function run()
    {

        Department::firstorcreate([
            'department_name' => 'Executive', 'company_id' => 8
        ]);
        Department::firstorcreate([
            'department_name' => 'Innovations', 'company_id' => 8
        ]);
        Department::firstorcreate([
            'department_name' => 'Service Delivery', 'company_id' => 8
        ]);
        Department::firstorcreate([
            'department_name' => 'Infrastructure', 'company_id' => 8
        ]);
        Department::firstorcreate([
            'department_name' => 'Business Development', 'company_id' => 8
        ]);
    }
}
