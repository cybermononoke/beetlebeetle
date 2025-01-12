<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Center;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $center = Center::first() ?? Center::create([
            'name' => 'Default Center',
            'address' => '123 Default Street',
        ]);

        Client::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'center_id' => $center->id, 
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        Client::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '0987654321',
            'center_id' => $center->id, 
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
