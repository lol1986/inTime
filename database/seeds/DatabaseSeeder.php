<?php

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
        DB::table('companies')->insert([
            'cif'=> "B0457760",
            'name'=>'BSD',
            'address'=>'Avenida del piloto'
        ]);

        DB::table('companies')->insert([
            'cif'=> "B0455560",
            'name'=>'BSD2',
            'address'=>'Avenida del segundo piloto'
        ]);

        DB::table('users')->insert([
            'dni'=> "30987776z",
            'name' => "Super Admin",
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('30987776z'),
            'company'=>'1'
        ]);

        DB::table('users')->insert([
            'dni'=> "30987775z",
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('30987775z'),
            'company'=>'1'
        ]);
        
        DB::table('users')->insert([
            'dni'=> "30987774z",
            'name' => "User",
            'email' => 'user@gmail.com',
            'password' => Hash::make('30987774z'),
            'company'=>'1'
        ]);
    }
}
