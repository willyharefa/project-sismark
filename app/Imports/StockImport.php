<?php

namespace App\Imports;

use App\Models\Inventory\StockMaster;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StockImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        $indexData = 1;
        

        foreach ($collection as $item) {

            if ($indexData > 1) {
                $data['code_stock']     = !empty($item[0])  ? $item[0]  :'';
                $data['name_stock']     = !empty($item[1])  ? $item[1]  :'';
                $data['unit']           = !empty($item[2])  ? $item[2]  :'';
                $data['packaging']      = !empty($item[3])  ? $item[3]  :'';
                $data['stock_category'] = !empty($item[5])  ? $item[4]  :'';
                $data['branch_id']      = !empty($item[4])  ? $item[5]  :'';
                
                StockMaster::create($data);
            }

            $indexData++;
        }
    }
}
