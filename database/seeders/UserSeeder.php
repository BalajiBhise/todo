<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Balaji Bhise",
            'username' => "bhise@bound.com",
            'password' => "balaji@12345",
            'passFlag'=>0,
            'DeptId' =>2,
            'created_at' => now(),
            'updated_at' => now() 
        ]);
        User::create([
            'name' => "Tushar Bhise",
            'username' => "tushar@bound.com",
            'password' => "tushar@12345",
            'passFlag'=>0,
            'DeptId' =>4,
            'created_at' => now(),
            'updated_at' => now() 
        ]);
        User::create([
            'name' => "Amol B",
            'username' => "amol@bound.com",
            'password' => "amol@12345",
            'DeptId' =>3,
            'passFlag'=>0,
            'created_at' => now(),
            'updated_at' => now() 
        ]);
        User::create([
            'name' => "Satish Mungde",
            'username' => "mungde@bound.com",
            'password' => "satish@12345",
            'DeptId' =>1,
            'passFlag'=>0,
            'created_at' => now(),
            'updated_at' => now() 
        ]);
    }
}
