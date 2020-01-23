<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faculty;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $faculty = App\Faculty::pluck('id')->toArray();
    $department = App\Department::pluck('id')->toArray();
//    $user = factory(App\User::class)->create();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'matric_no' => Str::random(10),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'user_password' => $faker->name,
        'faculty_id' => $faker->randomElement($faculty),
        'department_id' => $faker->randomElement($department),
        'programme' => ['NCE','DEGREE'],
        'level' => '100',
        'last_login_at' => now(),
        'last_login_ip' => Str::random(10),
        'request' => 1,
        'blood' => ['A','B','AB'],
        'gender' => ['Male','Female'],
        'remember_token' => Str::random(10),
    ];
});
