<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        //create new admin user
        $admin = new Admin();
        $admin->name = 'Admin';
        $admin -> email = 'admin@gmail.com';
        $admin ->password = Hash::make('password');
        $admin -> token='';

        $admin->save();

    }
}
