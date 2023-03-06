<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Juan Dela Cruz',
               'email'=>'jdcruz@student.apc.edu.ph',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Julian Timbers',
               'email'=>'jtimbers@apc.edu.ph',
               'type'=> 1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Clinic',
               'email'=>'masterclinic@apc.edu.ph',
               'type'=>2,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
