<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'task' => 'Show User Wise Data',
            'EmpId' => 1,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Task::create([
            'task' => 'Show Department Wise Data',
            'EmpId' => 2,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Task::create([
            'task' => 'Do the Testing of user module',
            'EmpId' => 4,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
