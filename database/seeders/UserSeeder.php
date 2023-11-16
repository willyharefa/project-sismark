<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Taufan',
            'nickname' => 'Taufan',
            'gender' => 'Male',
            'employee_id' => '0819.01.1.1.1.001',
            'title_id' => 1,
            'phone_number' => '0813 1345 2451',
            'email' => 'taufan@mitoindonesia.com',
            'username' => 'taufan',
            'password' => Hash::make('taufan@2410'),
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Rahman Can',
            'nickname' => 'Rahman',
            'gender' => 'Male',
            'employee_id' => '000.00.0.0.00',
            'title_id' => 2,
            'phone_number' => 'Tidak Tersedia',
            'email' => 'rrahmancan@gmail.com',
            'username' => 'rahmancan',
            'password' => Hash::make('rahman@1603'),
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Abraham',
            'nickname' => 'Abraham',
            'gender' => 'Male',
            'employee_id' => '1021.11.2.1.1.036',
            'title_id' => 3,
            'phone_number' => '0811 751 916',
            'email' => 'abraham@mitoindonesia.com',
            'username' => 'abraham',
            'password' => Hash::make('abraham@1402'),
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Susilawati',
            'nickname' => 'Susi',
            'gender' => 'Female',
            'employee_id' => '0121.02.3.1.1.014',
            'title_id' => 6,
            'phone_number' => '0813 7140 2723',
            'email' => 'susila2212@gmail.com',
            'username' => 'susi',
            'password' => Hash::make('susi@2212'),
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Erton Tito Hutagaol',
            'nickname' => 'Erton',
            'gender' => 'Male',
            'employee_id' => '1021.06.3.1.1.035',
            'title_id' => 4,
            'phone_number' => '0853 6317 2525',
            'email' => 'erton@mitoindonesia.com',
            'username' => 'erton',
            'password' => Hash::make('erton@1806'),
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Gea Nabila Sari',
            'nickname' => 'Gea',
            'gender' => 'Female',
            'employee_id' => '0822.07.5.1.1.051',
            'title_id' => 16,
            'phone_number' => '0823 8481 6321',
            'email' => 'gea@mitoindonesia.com',
            'username' => 'gea',
            'password' => Hash::make('gea@0908'),
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Sintia Lestari',
            'nickname' => 'Sintia',
            'gender' => 'Female',
            'employee_id' => '0323.07.6.1.1.065',
            'title_id' => 17,
            'phone_number' => '0813 1345 2451',
            'email' => 'sintia@mitoindonesia.com',
            'username' => 'sintia',
            'password' => Hash::make('sintia@2102'),
            'branch_id' => 1,
        ]);

        User::create([
            'name' => 'Yudha Satria',
            'nickname' => 'Yudha',
            'gender' => 'Male',
            'employee_id' => '0723.07.6.1.1.072',
            'title_id' => 17,
            'phone_number' => '0853 6387 7814',
            'email' => 'yudhasatria@mitoindonesia.com',
            'username' => 'yudhasatria',
            'password' => Hash::make('yudhasatria@1012'),
            'branch_id' => 1,
        ]);
    }
}
