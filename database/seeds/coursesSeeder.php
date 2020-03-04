<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; //add

class coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            ['organization'=>'1','name'=>'1st dev course','opening'=>Carbon::yesterday(),'closing'=>Carbon::today()->addmonth()],
            ['organization'=>'1','name'=>'2nd dev course','opening'=>Carbon::yesterday(),'closing'=>Carbon::today()->addmonth()],
            ['organization'=>'2','name'=>'26th dev course','opening'=>Carbon::yesterday(),'closing'=>Carbon::today()->addmonth()],
            ['organization'=>'2','name'=>'27th dev course','opening'=>Carbon::yesterday(),'closing'=>Carbon::today()->addmonth()],
        ];
        DB::table('courses')->insert($courses);        
    }
}
