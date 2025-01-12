<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmailsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $emails = [];

        for ($i = 0; $i < 15; $i++) {
            $emails[] = [
                'to' => $faker->unique()->email,
                'from' => $faker->unique()->email,
                'subject' => $faker->sentence,
                'content' => $faker->paragraphs(5, true),
                'folder' => $faker->randomElement(['inbox', 'junk', 'draft']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('emails')->insert($emails);

        echo "Seeder executed successfully.";
    }
}
