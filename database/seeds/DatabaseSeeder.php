<?php

use Illuminate\Database\Seeder;

use App\Machtiging;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
        {
             $this->call(UserTableSeeder::class);
        }
}
