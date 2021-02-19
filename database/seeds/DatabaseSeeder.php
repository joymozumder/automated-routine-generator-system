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
         $this->call(SessionDatasTableSeeder::class);
         $this->call(CoursesTableSeeder::class);
         $this->call(RoomsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         //$this->call(SemesterCoursesTableSeeder::class);
         //$this->call(RoutinesTableSeeder::class);
    }
}
