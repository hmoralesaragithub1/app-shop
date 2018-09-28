<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'Herman Morales Ara',
            'email'=>'hmoralesara@gmail.com',
            'password'=>bcrypt('admin1234'),
            'admin'=>true
        ]);

        User::create([
            'name'=>'Carolina Sanchez Leon',
            'email'=>'csanchezl@gmail.com',
            'password'=>bcrypt('admin1234')
        ]);
    }
}
