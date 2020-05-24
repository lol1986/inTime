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
            'dni'=> "11111111A",
            'name' => "Usuario superadmin",
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('11111111A'),
            'company'=>'1',
            'active'=>'1'
        ]);

        DB::table('users')->insert([
            'dni'=> "11111111B",
            'name' => "Usuario administrador",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111B'),
            'company'=>'1',
            'active'=>'1'
        ]);
        
        DB::table('users')->insert([
            'dni'=> "11111111C",
            'name' => "Usuario genérico",
            'email' => 'user@gmail.com',
            'password' => Hash::make('11111111C'),
            'company'=>'1',
            'active'=>'1'
        ]);

        DB::table('roles')->insert([
            'name'=> "superadmin",
        ]);

        DB::table('roles')->insert([
            'name'=> "admin",
        ]);

        DB::table('roles')->insert([
            'name'=> "user",
        ]);

        DB::table('role_user')->insert([
            'user_id'=> "1",
            'role_id'=> "1",
        ]);

        DB::table('role_user')->insert([
            'user_id'=> "2",
            'role_id'=> "2",
        ]);

        DB::table('role_user')->insert([
            'user_id'=> "3",
            'role_id'=> "3",
        ]);
    }
}
