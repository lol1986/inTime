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
            'name'=>'Empresa1',
            'address'=>'Avenida número 1',
            'holidays'=>'30',
            'active'=>'1'
        ]);

        DB::table('calendars')->insert([
            'name'=> "Alicante",
            'active'=>'1'
        ]);

        DB::table('calendars')->insert([
            'name'=> "Madrid",
            'active'=>'1'
        ]);

        DB::table('holidays')->insert([
            'calendar_id'=> "1",
            'date'=> "2020-01-01",
            'active'=>'1'
        ]);


        DB::table('users')->insert([
            'dni'=> "11111111A",
            'name' => "Usuario superadmin",
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('11111111A'),
            'company_id'=>'1',
            'calendar_id'=>'1',
            'holidays'=>'30',
            'pending'=>'0',
            'active'=>'1',
            'role_id'=>'1'
        ]);

        DB::table('users')->insert([
            'dni'=> "11111111B",
            'name' => "Usuario administrador",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111B'),
            'company_id'=>'1',
            'calendar_id'=>'1',
            'holidays'=>'30',
            'pending'=>'0',
            'active'=>'1',
            'role_id'=>'2'
        ]);
        
        DB::table('users')->insert([
            'dni'=> "11111111C",
            'name' => "Usuario genérico",
            'email' => 'user@gmail.com',
            'password' => Hash::make('11111111C'),
            'company_id'=>'1',
            'calendar_id'=>'2',
            'holidays'=>'30',
            'pending'=>'0',
            'active'=>'1',
            'role_id'=>'3'
        ]);

        DB::table('roles')->insert([
            'name'=> "superadmin",
            'active'=>'1'
        ]);

        DB::table('roles')->insert([
            'name'=> "admin",
            'active'=>'1'
        ]);

        DB::table('roles')->insert([
            'name'=> "user",
            'active'=>'1'
        ]);

        DB::table('holidays')->insert([
            'calendar_id'=> "1",
            'date'=> "2020-01-01",
            'active'=>'1'
        ]);

        DB::table('holidays')->insert([
            'calendar_id'=> "2",
            'date'=> "2020-01-05",
            'active'=>'1'
        ]);

        DB::table('usersholidays')->insert([
            'user_id'=> "1",
            'start'=> "2020-01-01",
            'end'=> "2020-01-05",
            'days'=> 5,
            'status'=> "pending",
            'active'=>'1'
        ]);

        DB::table('usersholidays')->insert([
            'user_id'=> "1",
            'start'=> "2020-01-01",
            'end'=> "2020-01-05",
            'days'=> 5,
            'status'=> "approved",
            'active'=>'1'
        ]);

        DB::table('usersholidays')->insert([
            'user_id'=> "1",
            'start'=> "2020-01-01",
            'end'=> "2020-01-05",
            'days'=> 5,
            'status'=> "denied",
            'active'=>'1'
        ]);

        DB::table('leaves')->insert([
            'user_id'=> "1",
            'start'=> "2020-01-01",
            'end'=> "2020-01-05",
            'days'=> 5,
            'attachment'=> null,
            'active'=>'1'
        ]);


        DB::table('timeregistries')->insert([
            'user_id'=> "1",
            'status'=> "open",
            'date'=> now(),
            'active'=>'1'
        ]);

        DB::table('timeregistries')->insert([
            'user_id'=> "1",
            'status'=> "closed",
            'date'=> now(),
            'active'=>'1'
        ]);

        DB::table('timeregistries')->insert([
            'user_id'=> "1",
            'status'=> "closed",
            'date'=> now(),
            'active'=>'1'
        ]);

        DB::table('timeregistries')->insert([
            'user_id'=> "1",
            'status'=> "closed",
            'date'=> now(),
            'active'=>'1'
        ]);


        DB::table('timeregistries')->insert([
            'user_id'=> "2",
            'status'=> "open",
            'date'=> now(),
            'active'=>'1'
        ]);

        DB::table('timeregistries')->insert([
            'user_id'=> "2",
            'status'=> "closed",
            'date'=> now(),
            'active'=>'1'
        ]);

        DB::table('timeregistries')->insert([
            'user_id'=> "2",
            'status'=> "closed",
            'date'=> now(),
            'active'=>'1'
        ]);

        DB::table('timeregistries')->insert([
            'user_id'=> "3",
            'status'=> "open",
            'date'=> now(),
            'active'=>'1'
        ]);

        DB::table('registryevents')->insert([
            'timeregistry_id'=> "1",
            'date'=> "2020-01-02 09:13:13",
            'type'=> "pin",
            'active'=>'1'
        ]);

        DB::table('registryevents')->insert([
            'timeregistry_id'=> "1",
            'date'=> "2020-01-02 09:55:24",
            'type'=> "pout",
            'active'=>'1'
        ]);

        DB::table('registryevents')->insert([
            'timeregistry_id'=> "2",
            'date'=> "2020-01-01 08:10:04",
            'type'=> "in",
            'active'=>'1'
        ]);

        DB::table('registryevents')->insert([
            'timeregistry_id'=> "2",
            'date'=> "2020-01-01 17:50:00",
            'type'=> "out",
            'active'=>'1'
        ]);

        DB::table('registryevents')->insert([
            'timeregistry_id'=> "2",
            'date'=> "2020-01-01 09:15:00",
            'type'=> "pin",
            'active'=>'1'
        ]);

        DB::table('registryevents')->insert([
            'timeregistry_id'=> "2",
            'date'=> "2020-01-01 10:02:53",
            'type'=> "pout",
            'active'=>'1'
        ]);


        DB::table('registryevents')->insert([
            'timeregistry_id'=> "3",
            'date'=> now(),
            'type'=> "in",
            'active'=>'1'
        ]);

        DB::table('registryevents')->insert([
            'timeregistry_id'=> "3",
            'date'=> "2020-01-02 09:13:13",
            'type'=> "pin",
            'active'=>'1'
        ]);

        DB::table('registryevents')->insert([
            'timeregistry_id'=> "3",
            'date'=> "2020-01-02 09:55:24",
            'type'=> "pout",
            'active'=>'1'
        ]);

    }
}
