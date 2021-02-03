<?php

use Illuminate\Database\Seeder;
use App\SemesterSection;
class SemesterSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SemesterSection::create(['semester'=>'1A','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'2A','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'2B','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'2C','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'3A','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'4A','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'4B','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'4C','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'5A','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'6A','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'6B','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'6C','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'7A','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'8A','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'8B','status'=>true,'session_name'=>'august2019',]);
        SemesterSection::create(['semester'=>'8C','status'=>true,'session_name'=>'august2019',]);
    }
}

// semester	status	session_name