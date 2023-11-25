<?php

namespace Database\Seeders;

use App\Models\Backend\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Title::create(['name_title' => 'Direktur']); //1
        Title::create(['name_title' => 'Komisaris']); //2
        Title::create(['name_title' => 'General Manager']); //3
        Title::create(['name_title' => 'Head Sales Marketing & Teknisi']); //4
        Title::create(['name_title' => 'Head Logistik']); //5
        Title::create(['name_title' => 'Head Accounting, Finance & Tax']); //6
        Title::create(['name_title' => 'Head HRGA & IT']); //7
        Title::create(['name_title' => 'Branch Manager']);  //8
        Title::create(['name_title' => 'SPV HRD']); //9
        Title::create(['name_title' => 'SPV Teknisi']); //10
        Title::create(['name_title' => 'SPV GA']); //11
        Title::create(['name_title' => 'SPV Finance']); //12
        Title::create(['name_title' => 'Staff Senior']); //13
        Title::create(['name_title' => 'Admin GA']); //14
        Title::create(['name_title' => 'Admin Logistik']); //15
        Title::create(['name_title' => 'Admin Sales']); //16
        Title::create(['name_title' => 'Staff Sales Marketing']); //17
        Title::create(['name_title' => 'Staff Teknisi']);
        Title::create(['name_title' => 'Staff Purchasing']);
        Title::create(['name_title' => 'Staff Finance']);
        Title::create(['name_title' => 'Staff Accounting']);
        Title::create(['name_title' => 'Staff HRD']);
        Title::create(['name_title' => 'Staff IT']);
        Title::create(['name_title' => 'Staff GA']);
    }
}
