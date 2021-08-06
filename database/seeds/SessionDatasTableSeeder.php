<?php

use Illuminate\Database\Seeder;
use App\SessionData;

class SessionDatasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SessionData::create([
            'session_name' => 'august2019',
            'status' => true,
        ]);
        SessionData::create([
            'session_name' => 'august2018',
            'status' => false,
        ]);
    }
}
