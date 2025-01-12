<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\Center;
use App\Models\Client;
use Carbon\Carbon;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        $center = Center::firstOrCreate(
            ['name' => 'Main Center'],
            ['address' => '123 Main Street']
        );
        
        $client = Client::firstOrCreate(
            ['email' => 'john@example.com'], 
            ['name' => 'John Doe', 'phone' => '1234567890'] 
        );


        Notification::insert([
            [
                'title' => 'Welcome Notification',
                'body' => 'Thank you for joining our platform.',
                'type' => 'welcome',
                'read_at' => null,
                'center_id' => $center->id,
                'client_id' => $client->id, 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'System Update',
                'body' => 'We have updated our system. Please review the changes.',
                'type' => 'system',
                'read_at' => null,
                'center_id' => $center->id,
                'client_id' => $client->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Promotion',
                'body' => 'Enjoy a 20% discount on your next purchase!',
                'type' => 'promotion',
                'read_at' => Carbon::now(),
                'center_id' => $center->id,
                'client_id' => $client->id,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
        ]);
    }
}
