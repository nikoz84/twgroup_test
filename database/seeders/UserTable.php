<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Nicolás Romero',
            'email'    => 'nikoz@gmail.com',
            'password' => Hash::make('123456')
        ));

        User::create([
            'name'     => 'Tamara Vasquez',
            'email'    => 'vasquez@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name'     => 'Felipe Barrientos',
            'email'    => 'barros@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name'     => 'Isabel Fernandez',
            'email'    => 'fernan@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
