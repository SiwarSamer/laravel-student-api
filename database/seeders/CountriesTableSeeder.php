<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        $countries = ['Palestine', 'USA', 'Germany', 'France', 'Japan'];

        foreach ($countries as $country) {
            Country::create(['name' => $country]);
        }
    }
}
