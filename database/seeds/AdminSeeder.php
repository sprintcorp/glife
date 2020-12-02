<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = new User();
        $superAdmin->name = "Adeyemi College of Education";
        $superAdmin->matric_no = "admin";
        $superAdmin->isAdmin = 1;
        $superAdmin->email = "superadmin@schoolkia.com";
        $superAdmin->password = Hash::make('secret123');
        $superAdmin->user_password = 'secret123';
        $superAdmin->save();
    }
}