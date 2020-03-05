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
            ['name' => 'sima', 'email' => 'simanaka@sage.ocn.ne.jp']
            );
        factory(App\User::class, 2)->create();
        factory(App\Staff::class, 2)->create();
        factory(App\Admin::class)->create(
            ['name' => 'Adminstrator', 'username' => 'root', 'password' => bcrypt('admin')]
            );
        }
}
