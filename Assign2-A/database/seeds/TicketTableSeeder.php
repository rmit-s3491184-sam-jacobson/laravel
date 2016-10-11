<?php

use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'type' => 'Adult',
            'price' => '15',
            'sessionId' => '1'
        ]);

        DB::table('tickets')->insert([
            'type' => 'Children',
            'price' => '15',
            'sessionId' => '2'
        ]);

        DB::table('tickets')->insert([
            'type' => 'Concession',
            'price' => '10',
            'sessionId' => '3'
        ]);
    }
}
