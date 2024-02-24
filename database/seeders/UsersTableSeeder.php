<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Создаем Админов сайта
        DB::table('users')->insert([

            [
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'manager',
                'email' => 'manager@manager.ru',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'client',
                'email' => 'client@client.ru',
                'password' => bcrypt('12345678'),
            ],

        ]);
    }
}
