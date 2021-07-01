<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events =  [
            [
              'title' => 'Reuniao 01',
              'start' => '2021-07-01',
              'end' => '2021-07-03',
            ],
            [
              'title' => 'Reuniao 02',
              'start' => '2021-07-07',
              'end' => '2021-07-010',
            ]
          ];
    }
}
