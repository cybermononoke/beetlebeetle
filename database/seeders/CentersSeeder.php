<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Center;

class CentersSeeder extends Seeder
{
    public function run(): void
    {
        Center::create([
            'name' => 'Downtown Office Space',
            'address' => '123 Main St, Downtown, NY',
            'office_type' => 'Co-working',
            'is_available' => true,
        ]);

        Center::create([
            'name' => 'Uptown Business Hub',
            'address' => '456 Uptown Ave, New York, NY',
            'office_type' => 'Private Office',
            'is_available' => false,
        ]);

        Center::create([
            'name' => 'Suburban Office Suites',
            'address' => '789 Suburb Rd, Suburbia, NY',
            'office_type' => 'Shared Office',
            'is_available' => true,
        ]);
    }
}
