<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $websites = [
            [
                'name' => 'Google.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Facebook.com',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('websites')->insert($websites);
    }
}
