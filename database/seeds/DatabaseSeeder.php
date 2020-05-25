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

        DB::table('calendars')->insert([
            'name'=> "Alicante",
        ]);

        DB::table('calendars')->insert([
            'name'=> "Madrid",
        ]);

        DB::table('holidays')->insert([
            'calendar'=> "1",
            'date'=> "2020-01-01",
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
            'calendar'=>'1',
            'active'=>'1'
        ]);

        DB::table('users')->insert([
            'dni'=> "11111111B",
            'name' => "Usuario administrador",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111B'),
            'company'=>'1',
            'calendar'=>'1',
            'active'=>'1'
        ]);
        
        DB::table('users')->insert([
            'dni'=> "11111111C",
            'name' => "Usuario genérico",
            'email' => 'user@gmail.com',
            'password' => Hash::make('11111111C'),
            'company'=>'1',
            'calendar'=>'2',
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

        DB::table('holidays')->insert([
            'calendar'=> "1",
            'date'=> "2020-01-01",
        ]);

        DB::table('holidays')->insert([
            'calendar'=> "2",
            'date'=> "2020-01-05",
        ]);

        DB::table('usersholidays')->insert([
            'user'=> "1",
            'start'=> "2020-01-01",
            'end'=> "2020-01-05",
            'days'=> 5,
            'status'=> "pending",
        ]);

        DB::table('usersholidays')->insert([
            'user'=> "1",
            'start'=> "2020-01-01",
            'end'=> "2020-01-05",
            'days'=> 5,
            'status'=> "approved",
        ]);

        DB::table('usersholidays')->insert([
            'user'=> "1",
            'start'=> "2020-01-01",
            'end'=> "2020-01-05",
            'days'=> 5,
            'status'=> "denied",
        ]);

        DB::table('leaves')->insert([
            'user'=> "1",
            'start'=> "2020-01-01",
            'end'=> "2020-01-05",
            'days'=> 5,
            'attachment'=> null,
        ]);

        DB::table('timeregistry')->insert([
            'user'=> "1",
            'date'=> "2020-01-01 08:10:04",
            'type'=> "in",
        ]);

        DB::table('timeregistry')->insert([
            'user'=> "1",
            'date'=> "2020-01-01 17:50:00",
            'type'=> "out",
        ]);

        DB::table('timeregistry')->insert([
            'user'=> "1",
            'date'=> "2020-01-01 09:15:00",
            'type'=> "pin",
        ]);

        DB::table('timeregistry')->insert([
            'user'=> "1",
            'date'=> "2020-01-01 10:02:53",
            'type'=> "pout",
        ]);


        DB::table('timeregistry')->insert([
            'user'=> "1",
            'date'=> "2020-01-02 07:55:00",
            'type'=> "in",
        ]);

        DB::table('timeregistry')->insert([
            'user'=> "1",
            'date'=> "2020-01-02 09:13:13",
            'type'=> "pin",
        ]);

        DB::table('timeregistry')->insert([
            'user'=> "1",
            'date'=> "2020-01-02 09:55:24",
            'type'=> "pout",
        ]);

    }
}
