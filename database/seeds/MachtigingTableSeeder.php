<?php

use Illuminate\Database\Seeder;

use App\Machtiging;

class MachtigingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      $mb = "9.99EUR one time fee";
      for ($i=0; $i < 10; $i++) {
        App\Machtiging::create([
          'user_id' => $faker->unique()->randomDigit,
          'iban' => $faker->iban('NL'),
          'creditcard' => $faker->creditCardNumber, 
          'membership_plan' => $mb,
          'fullname' => $faker->name
        ]);
      }
    }
}
