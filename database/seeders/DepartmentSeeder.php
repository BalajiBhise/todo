<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'deptName' => 'Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Department::create([
            'deptName' => 'Development',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Department::create([
            'deptName' => 'Technical Support',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Department::create([
            'deptName' => 'BackOffice',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
