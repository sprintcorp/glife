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
        $superAdmin->email = "superadmin@schoolkia.com";
        $superAdmin->phone_number = "08044446218";
        $superAdmin->password = Hash::make('secret123');
        $superAdmin->user_password = 'secret123';
        $superAdmin->save();
    }
}