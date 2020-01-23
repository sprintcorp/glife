<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'User',
                'email'=>'user@mail.com',
                'matric_no' => Str::random(10),
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
                'user_password' => '123456',
                'faculty_id' => '1',
                'department_id' => '1',
                'programme' => 'NCE',
                'level' => '100',
                'last_login_at' => now(),
                'last_login_ip' => Str::random(10),
                'request' => 1,
                'blood' => 'A',
                'gender' => 'Male',
                'remember_token' => Str::random(10),
            ],
        ];

        for($i = 0; $i < 1000; $i++) {
            User::create($user);
        }
    }
}
