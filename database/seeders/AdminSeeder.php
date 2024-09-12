<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ADMIN;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ADMIN::create([
            'username' => 'admin@gmail.com',
            'password' => "123456"
        ]);
    }
}
