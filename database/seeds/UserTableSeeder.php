<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = Faker\Factory::create();
          for ($i=0; $i < 10; $i++) {
            App\User::create([
              'name' => $faker->name,
              'email' => $faker->unique()->email,
              'password' => $faker->password
            ]);
          }

    }
}
