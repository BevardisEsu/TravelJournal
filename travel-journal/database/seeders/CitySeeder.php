<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            // United States (country_id: 1)
            ['country_id' => 1, 'name' => 'New York', 'latitude' => 40.7128, 'longitude' => -74.0060, 'population' => 8336817, 'is_capital' => false],
            ['country_id' => 1, 'name' => 'Los Angeles', 'latitude' => 34.0522, 'longitude' => -118.2437, 'population' => 3979576, 'is_capital' => false],
            ['country_id' => 1, 'name' => 'Washington D.C.', 'latitude' => 38.9072, 'longitude' => -77.0369, 'population' => 705749, 'is_capital' => true],
            ['country_id' => 1, 'name' => 'San Francisco', 'latitude' => 37.7749, 'longitude' => -122.4194, 'population' => 873965, 'is_capital' => false],

            // France (country_id: 2)
            ['country_id' => 2, 'name' => 'Paris', 'latitude' => 48.8566, 'longitude' => 2.3522, 'population' => 2161000, 'is_capital' => true],
            ['country_id' => 2, 'name' => 'Lyon', 'latitude' => 45.7640, 'longitude' => 4.8357, 'population' => 515695, 'is_capital' => false],
            ['country_id' => 2, 'name' => 'Marseille', 'latitude' => 43.2965, 'longitude' => 5.3698, 'population' => 861635, 'is_capital' => false],
            ['country_id' => 2, 'name' => 'Nice', 'latitude' => 43.7102, 'longitude' => 7.2620, 'population' => 342522, 'is_capital' => false],

            // Japan (country_id: 3)
            ['country_id' => 3, 'name' => 'Tokyo', 'latitude' => 35.6762, 'longitude' => 139.6503, 'population' => 13929286, 'is_capital' => true],
            ['country_id' => 3, 'name' => 'Osaka', 'latitude' => 34.6937, 'longitude' => 135.5023, 'population' => 2691742, 'is_capital' => false],
            ['country_id' => 3, 'name' => 'Kyoto', 'latitude' => 35.0116, 'longitude' => 135.7681, 'population' => 1475183, 'is_capital' => false],
            ['country_id' => 3, 'name' => 'Hiroshima', 'latitude' => 34.3853, 'longitude' => 132.4553, 'population' => 1194034, 'is_capital' => false],

            // Italy (country_id: 4)
            ['country_id' => 4, 'name' => 'Rome', 'latitude' => 41.9028, 'longitude' => 12.4964, 'population' => 2872800, 'is_capital' => true],
            ['country_id' => 4, 'name' => 'Milan', 'latitude' => 45.4642, 'longitude' => 9.1900, 'population' => 1350680, 'is_capital' => false],
            ['country_id' => 4, 'name' => 'Florence', 'latitude' => 43.7696, 'longitude' => 11.2558, 'population' => 382258, 'is_capital' => false],
            ['country_id' => 4, 'name' => 'Venice', 'latitude' => 45.4408, 'longitude' => 12.3155, 'population' => 261905, 'is_capital' => false],

            // Germany (country_id: 5)
            ['country_id' => 5, 'name' => 'Berlin', 'latitude' => 52.5200, 'longitude' => 13.4050, 'population' => 3669491, 'is_capital' => true],
            ['country_id' => 5, 'name' => 'Munich', 'latitude' => 48.1351, 'longitude' => 11.5820, 'population' => 1471508, 'is_capital' => false],
            ['country_id' => 5, 'name' => 'Hamburg', 'latitude' => 53.5511, 'longitude' => 9.9937, 'population' => 1899160, 'is_capital' => false],

            // Spain (country_id: 6)
            ['country_id' => 6, 'name' => 'Madrid', 'latitude' => 40.4168, 'longitude' => -3.7038, 'population' => 3223334, 'is_capital' => true],
            ['country_id' => 6, 'name' => 'Barcelona', 'latitude' => 41.3851, 'longitude' => 2.1734, 'population' => 1620343, 'is_capital' => false],
            ['country_id' => 6, 'name' => 'Seville', 'latitude' => 37.3891, 'longitude' => -5.9845, 'population' => 688711, 'is_capital' => false],

            // United Kingdom (country_id: 7)
            ['country_id' => 7, 'name' => 'London', 'latitude' => 51.5074, 'longitude' => -0.1278, 'population' => 8982000, 'is_capital' => true],
            ['country_id' => 7, 'name' => 'Edinburgh', 'latitude' => 55.9533, 'longitude' => -3.1883, 'population' => 506520, 'is_capital' => false],
            ['country_id' => 7, 'name' => 'Manchester', 'latitude' => 53.4808, 'longitude' => -2.2426, 'population' => 547858, 'is_capital' => false],

            // Canada (country_id: 8)
            ['country_id' => 8, 'name' => 'Ottawa', 'latitude' => 45.4215, 'longitude' => -75.6972, 'population' => 994837, 'is_capital' => true],
            ['country_id' => 8, 'name' => 'Toronto', 'latitude' => 43.6532, 'longitude' => -79.3832, 'population' => 2731571, 'is_capital' => false],
            ['country_id' => 8, 'name' => 'Vancouver', 'latitude' => 49.2827, 'longitude' => -123.1207, 'population' => 631486, 'is_capital' => false],

            // Australia (country_id: 9)
            ['country_id' => 9, 'name' => 'Canberra', 'latitude' => -35.2809, 'longitude' => 149.1300, 'population' => 431380, 'is_capital' => true],
            ['country_id' => 9, 'name' => 'Sydney', 'latitude' => -33.8688, 'longitude' => 151.2093, 'population' => 5312163, 'is_capital' => false],
            ['country_id' => 9, 'name' => 'Melbourne', 'latitude' => -37.8136, 'longitude' => 144.9631, 'population' => 5078193, 'is_capital' => false],

            // Thailand (country_id: 10)
            ['country_id' => 10, 'name' => 'Bangkok', 'latitude' => 13.7563, 'longitude' => 100.5018, 'population' => 10539415, 'is_capital' => true],
            ['country_id' => 10, 'name' => 'Chiang Mai', 'latitude' => 18.7883, 'longitude' => 98.9853, 'population' => 127240, 'is_capital' => false],
            ['country_id' => 10, 'name' => 'Phuket', 'latitude' => 7.8804, 'longitude' => 98.3923, 'population' => 79308, 'is_capital' => false],
        ];

        foreach ($cities as &$city) {
            $city['created_at'] = now();
            $city['updated_at'] = now();
        }

        DB::table('cities')->insert($cities);
    }
}