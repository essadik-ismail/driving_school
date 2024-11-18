<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscription_plans')->insert(
            [
                [
                    'plan_name' => 'basic',
                    'price' => 1500,
                    'maxUsers' => 5,
                    'MaxStockItems' => 500,
                ],
                [
                    'plan_name' => 'premium',
                    'price' => 3500,
                    'maxUsers' => 10,
                    'MaxStockItems' => 1500,
                ],
                [
                    'plan_name' => 'business',
                    'price' => 7500,
                    'maxUsers' => 50,
                    'MaxStockItems' => 5500,
                ],
            ]
        );
    }
}
