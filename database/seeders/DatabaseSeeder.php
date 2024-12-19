<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Owner;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $owners = [
            [
                'id' => 1,
                'name' => 'Kiss Péter',
                'email' => 'kiss.peter@example.com',
                'phone_number' => '06201234567'
            ],
            [
                'id' => 2,
                'name' => 'Nagy Anna',
                'email' => 'nagy.anna@example.com',
                'phone_number' => '06301234567'
            ],
            [
                'id' => 3,
                'name' => 'Szabó János',
                'email' => 'szabo.janos@example.com',
                'phone_number' => '06701234567'
            ]
        ];
        foreach ($owners as $owner) {
            Owner::create($owner);
        }
    
        $cars = [
            [
                'id' => 1,
                'brand' => 'Ford',
                'model' => 'Focus',
                'license_plate' => 'ABC-123',
                'owner_id' => 1
            ],
            [
                'id' => 2,
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'license_plate' => 'XYZ-789',
                'owner_id' => 2
            ],
            [
                'id' => 3,
                'brand' => 'Volkswagen',
                'model' => 'Golf',
                'license_plate' => 'GHJ-456',
                'owner_id' => 3
            ],
            [
                'id' => 4,
                'brand' => 'Opel',
                'model' => 'Astra',
                'license_plate' => 'LMN-321',
                'owner_id' => 1
            ]
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
