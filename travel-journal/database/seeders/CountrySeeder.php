<?php
// database/seeders/CountrySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            [
                'name' => 'United States',
                'code' => 'US',
                'iso3' => 'USA',
                'latitude' => 39.8283,
                'longitude' => -98.5795,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'France',
                'code' => 'FR',
                'iso3' => 'FRA',
                'latitude' => 46.2276,
                'longitude' => 2.2137,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Japan',
                'code' => 'JP',
                'iso3' => 'JPN',
                'latitude' => 36.2048,
                'longitude' => 138.2529,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Italy',
                'code' => 'IT',
                'iso3' => 'ITA',
                'latitude' => 41.8719,
                'longitude' => 12.5674,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Germany',
                'code' => 'DE',
                'iso3' => 'DEU',
                'latitude' => 51.1657,
                'longitude' => 10.4515,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Spain',
                'code' => 'ES',
                'iso3' => 'ESP',
                'latitude' => 40.4637,
                'longitude' => -3.7492,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'United Kingdom',
                'code' => 'GB',
                'iso3' => 'GBR',
                'latitude' => 55.3781,
                'longitude' => -3.4360,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Canada',
                'code' => 'CA',
                'iso3' => 'CAN',
                'latitude' => 56.1304,
                'longitude' => -106.3468,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Australia',
                'code' => 'AU',
                'iso3' => 'AUS',
                'latitude' => -25.2744,
                'longitude' => 133.7751,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thailand',
                'code' => 'TH',
                'iso3' => 'THA',
                'latitude' => 15.8700,
                'longitude' => 100.9925,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('countries')->insert($countries);
    }
}