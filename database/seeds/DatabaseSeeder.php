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
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class)->create(
            ['name' => 'your name', 'email' => 'your valid email address']
        );
        factory(App\User::class, 2)->create();
        factory(App\Admin::class)->create(
            ['name' => 'Adminstrator', 'username' => 'root', 'password' => bcrypt('admin')]
        );        
        Factory(App\Book::class, 15)->create(); // add
        
        $this->call('ctgriesSeeder'); 		//add
        $this->call('subctgriesSeeder'); 	//add
        
    }
}
