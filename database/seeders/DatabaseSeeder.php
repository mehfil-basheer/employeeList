<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Department;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['Sales and Marketing', 'Application Development'];
    foreach ($departments as $department) {
        Department::create(['name' => $department]);
    }

    $designations = ['Marketing Manager', 'Mobile Application Dev.'];
    foreach ($designations as $designation) {
        Designation::create(['name' => $designation]);
    }

    User::create([
        'name' => 'Jhon Due',
        'fk_department' => 1,
        'fk_designation' => 1,
        'phone_number' => '1234567890',
    ]);

    User::create([
        'name' => 'Tommy Mark',
        'fk_department' => 2,
        'fk_designation' => 2,
        'phone_number' => '1111111111',
    ]);

    User::create([
     'name' => 'mammootty',
     'fk_department' => 1, 
     'fk_designation' => 2, 
     'phone_number' => '369369369', 
     'created_at' => now()]);

    User::create([
        'name' => 'mohanlal',
        'fk_department' => 2,
        'fk_designation' => 1,
        'phone_number' => '22552255',
    ]);

   

    }
}
