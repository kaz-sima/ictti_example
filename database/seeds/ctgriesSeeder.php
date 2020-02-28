<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ctgriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ctgries = [
            //['code' => '', 'name' => 'ctgry'],
            ['code' => '1', 'name' => 'Lang'],
            ['code' => '2', 'name' => 'Method'],
            ['code' => '3', 'name' => 'Process'],
            ['code' => '4', 'name' => 'Network'],
            ['code' => '99', 'name' => 'other'],
        ];
        DB::table('ctgries')->insert($ctgries);
    }
}
