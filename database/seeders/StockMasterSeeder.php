<?php

namespace Database\Seeders;

use App\Models\Inventory\StockMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // MEICHEM SC 01 - PKU
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 01',
            'name_stock' => 'Alkalinity Booster',
            'unit' => 'Kg',
            'packaging' => '30Kg/sak',
            'branch_id' => 1,
        ]);
        // MEICHEM SC 02 - PKU
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 02',
            'name_stock' => 'Oxygen Scavenger',
            'unit' => 'Kg',
            'packaging' => '25Kg/sak',
            'branch_id' => 1,
        ]);
        // MEICHEM SC 03 - PKU
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 03',
            'name_stock' => 'Polymer Phospate',
            'unit' => 'Kg',
            'packaging' => '30Kg/sak',
            'branch_id' => 1,
        ]);
        // MEICHEM SC 04 - PKU
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 04',
            'name_stock' => 'Dispersant',
            'unit' => 'Kg',
            'packaging' => '30Kg/sak',
            'branch_id' => 1,
        ]);

        // MEICHEM SC 01 - MDN
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 01 - MDN',
            'name_stock' => 'Alkalinity Booster',
            'unit' => 'Kg',
            'packaging' => '30Kg/sak',
            'branch_id' => 2,
        ]);
        // MEICHEM SC 02 - MDN
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 02 - MDN',
            'name_stock' => 'Oxygen Scavenger',
            'unit' => 'Kg',
            'packaging' => '25Kg/sak',
            'branch_id' => 2,
        ]);
        // MEICHEM SC 03 - MDN
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 03 - MDN',
            'name_stock' => 'Polymer Phospate',
            'unit' => 'Kg',
            'packaging' => '30Kg/sak',
            'branch_id' => 2,
        ]);
        // MEICHEM SC 04 - MDN
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 04 - MDN',
            'name_stock' => 'Dispersant',
            'unit' => 'Kg',
            'packaging' => '30Kg/sak',
            'branch_id' => 2,
        ]);
        
        // MEICHEM SC 01 - PNK
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 01 - PNK',
            'name_stock' => 'Alkalinity Booster',
            'unit' => 'Kg',
            'packaging' => '30Kg/sak',
            'branch_id' => 3,
        ]);
        // MEICHEM SC 02 - PNK
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 02 - PNK',
            'name_stock' => 'Oxygen Scavenger',
            'unit' => 'Kg',
            'packaging' => '25Kg/sak',
            'branch_id' => 3,
        ]);
        // MEICHEM SC 03 - PNK
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 03 - PNK',
            'name_stock' => 'Polymer Phospate',
            'unit' => 'Kg',
            'packaging' => '30Kg/sak',
            'branch_id' => 3,
        ]);
        // MEICHEM SC 04 - PNK
        StockMaster::create([
            'code_stock' => 'MEICHEM SC 04 - PNK',
            'name_stock' => 'Dispersant',
            'unit' => 'Kg',
            'packaging' => '30Kg/sak',
            'branch_id' => 3,
        ]);

        // PAC DANCOW
        StockMaster::create([
            'code_stock' => 'PAC DANCOW',
            'name_stock' => 'Poly Alumunium Chloride',
            'unit' => 'Kg',
            'packaging' => '20Kg/sak',
            'branch_id' => 1,
        ]);
        // PAC DANCOW MDN
        StockMaster::create([
            'code_stock' => 'PAC DANCOW - MDN',
            'name_stock' => 'Poly Alumunium Chloride',
            'unit' => 'Kg',
            'packaging' => '20Kg/sak',
            'branch_id' => 2,
        ]);
        // PAC DANCOW PNK
        StockMaster::create([
            'code_stock' => 'PAC DANCOW - PNK',
            'name_stock' => 'Poly Alumunium Chloride',
            'unit' => 'Kg',
            'packaging' => '20Kg/sak',
            'branch_id' => 3,
        ]);

        // PAC MW
        StockMaster::create([
            'code_stock' => 'PAC MW',
            'name_stock' => 'Poly Alumunium Chloride',
            'unit' => 'Kg',
            'packaging' => '20Kg/sak',
            'branch_id' => 1,
        ]);
        // PAC MW MDN
        StockMaster::create([
            'code_stock' => 'PAC MW - MDN',
            'name_stock' => 'Poly Alumunium Chloride',
            'unit' => 'Kg',
            'packaging' => '20Kg/sak',
            'branch_id' => 2,
        ]);
        // PAC MW PNK
        StockMaster::create([
            'code_stock' => 'PAC MW - PNK',
            'name_stock' => 'Poly Alumunium Chloride',
            'unit' => 'Kg',
            'packaging' => '20Kg/sak',
            'branch_id' => 3,
        ]);

        // PAC DG
        StockMaster::create([
            'code_stock' => 'PAC DG',
            'name_stock' => 'Poly Alumunium Chloride',
            'unit' => 'Kg',
            'packaging' => '25Kg/sak',
            'branch_id' => 1,
        ]);
        // PAC DG MDN
        StockMaster::create([
            'code_stock' => 'PAC DG - MDN',
            'name_stock' => 'Poly Alumunium Chloride',
            'unit' => 'Kg',
            'packaging' => '25Kg/sak',
            'branch_id' => 2,
        ]);
        // PAC DG PNK
        StockMaster::create([
            'code_stock' => 'PAC DG - PNK',
            'name_stock' => 'Poly Alumunium Chloride',
            'unit' => 'Kg',
            'packaging' => '25Kg/sak',
            'branch_id' => 3,
        ]);
    }
}
