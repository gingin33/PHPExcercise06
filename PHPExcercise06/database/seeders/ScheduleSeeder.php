<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Schedule::create([
            'begin'=>date("Y/m/d H:i"),
            'end'=>date("Y/m/d H:i", strtotime('+1 day')),
            'place'=>'japan',
            'content'=>'hoge',
            'user_id'=>1,
        ]);
    }
}
