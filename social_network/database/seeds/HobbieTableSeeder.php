<?php

use Illuminate\Database\Seeder;
use App\Hobbie;

class HobbieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hobbie::class, 100)->create();
    }
}
