<?php

namespace App\Imports;

use App\Models\Sales\Pricelist;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PricelistImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        $indexData = 1;
        // $validatorData = Validator::make($collection->toArray(), [
        //     '*.9' => 'required|date',
        //     '*.10' => 'required|date',
        // ])->validate();
        // dd($validatorData);
        

        foreach ($collection as $item) {

            if ($indexData > 1) {
                // dd($item);
                
                $data['stock_master_id'] = !empty($item[0])  ? $item[0]  :'';
                $data['city_id']         = !empty($item[1])  ? $item[1]  :'';
                $data['vendor_id']       = !empty($item[2])  ? $item[2]  :'';
                $data['type_expedition'] = !empty($item[3])  ? $item[3]  :'';
                $data['purchase_price']  = !empty($item[4])  ? $item[4]  :'';
                $data['tax_price']       = !empty($item[5])  ? $item[5]  :'';
                $data['pay_a']           = !empty($item[6])  ? $item[6]  :'';
                $data['pay_b']           = !empty($item[7])  ? $item[7]  :'';
                $data['pay_c']           = !empty($item[8])  ? $item[8]  :'';
                $data['start_date']      = !empty($item[9])  ? Date::excelToDateTimeObject($item[9])->format('d-m-Y') :'';
                $data['end_date']        = !empty($item[10]) ? Date::excelToDateTimeObject($item[10])->format('d-m-Y') :'';
                
                Pricelist::create($data);
            }

            $indexData++;

        }
    }
}
