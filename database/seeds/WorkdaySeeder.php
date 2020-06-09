<?php

use Illuminate\Database\Seeder;

class WorkdaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('workdays')->insert([
            [ 'day' => 'Monday' ],
            [ 'day' => 'Tuesday' ],
            [ 'day' => 'Wednesday' ],
            [ 'day' => 'Thursday' ],
            [ 'day' => 'Friday' ],
            [ 'day' => 'Saturday' ],
            [ 'day' => 'Sunday' ],
        ]);
    }
}
