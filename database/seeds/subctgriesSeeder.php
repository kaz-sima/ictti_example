<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class subctgriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subctgries = [
            /* ['code' => '', 'name' => 'subctgry','ctgry_code'=>'0'],*/
            ['code' => '1', 'name' => 'JAVA','ctgry_code'=>'1'],
            ['code' => '2', 'name' => 'PHP','ctgry_code'=>'1'],
            ['code' => '3', 'name' => 'Python','ctgry_code'=>'1'],
            ['code' => '4', 'name' => 'OOD','ctgry_code'=>'2'],
            ['code' => '5', 'name' => 'SAD','ctgry_code'=>'2',],
            ['code' => '6', 'name' => 'AOD','ctgry_code'=>'2',],
            ['code' => '7', 'name' => 'RUP','ctgry_code'=>'3'],
            ['code' => '8', 'name' => 'SCRUM','ctgry_code'=>'3',],
            ['code' => '9', 'name' => 'WF','ctgry_code'=>'3'],
            ['code' => '10', 'name' => 'TCP/IP','ctgry_code' => '4'],
            ['code' => '11', 'name' => 'Security','ctgry_code'=>'4'],
            ['code' => '12', 'name' => 'Cloud','ctgry_code'=>'4'],
            ['code' => '99', 'name' => 'Others','ctgry_code'=>'99'],
        ];
        DB::table('subctgries')->insert($subctgries);
    }
}
