<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tenant::query()->create([
            'companyName'=> 'spectrum web hub',
            'address'=> 'fes morocco',
            'tel'=> '0625922555',
            'gsm'=> '0625922555',
            'email'=> 'contact@spw-hub.com',
            'website'=> 'spw-hub.com',
            'subscription_plan_id'=> 1,
        ]);
    }
}
