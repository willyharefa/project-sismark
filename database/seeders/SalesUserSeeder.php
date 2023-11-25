<?php

namespace Database\Seeders;

use App\Models\Account\SalesUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalesUser::create(['user_id' => 7]);
        SalesUser::create(['user_id' => 8]);
    }
}
