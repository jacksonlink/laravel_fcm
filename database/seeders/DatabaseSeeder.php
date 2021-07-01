<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('events')->insert(
            [
            'title' => 'Reuniao 01',
            'start' => '2021-07-01',
            'end' => '2021-07-03',
            ],[
            'title' => 'Reuniao 02',
            'start' => '2021-07-05',
            'end' => '2021-07-06',
            ]
        );
    }
}
