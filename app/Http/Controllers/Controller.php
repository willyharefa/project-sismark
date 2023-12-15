<?php

namespace App\Http\Controllers;

use Exception;
use App\Imports\StockImport;
use Illuminate\Http\Request;
use App\Imports\PricelistImport;
use App\Helpers\AbbreviateNumber;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Inventory\StockMaster;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function index()
    {
        $chart = (new LarapexChart)->lineChart()->setTitle('Penjualan Sales Marketing')
                    ->setSubtitle('PT Mito Energi Indonesia')
                    ->setHeight(345)
                    ->addData('Sales Marketing', [1000000, 2500000, 5000000, 6700000, 1520000])
                    ->setXAxis(['Jan', 'Feb', 'March', 'April', 'May', 'June']);
        
        $productChart = (new LarapexChart)->pieChart()
                        ->setTitle('Graph Product Sales')
                        ->setSubtitle('Season 2023')
                        ->setHeight(200)
                        ->addData([31, 4])
                        ->setLabels(['General Chemical', 'Specialty Chemical']);
        
        $salesMarketingChart = (new LarapexChart)->pieChart()
                        ->setTitle('Market Sales Marketing')
                        ->setSubtitle('Season 2023')
                        ->setHeight(200)
                        ->addData([21, 17, 121, 60])
                        ->setLabels(['Yudha Satria', 'Sintia Lestari', 'Mito', 'Erton']);

        $marketSalesBranchChart = (new LarapexChart)->pieChart()
                        ->setTitle('Market Sales All Office')
                        ->setSubtitle('Season 2023')
                        ->setHeight(200)
                        ->addData([134, 47, 58])
                        ->setLabels(['HO PT MEI', 'Medan', 'Pontianak']);

        $sumProduct = AbbreviateNumber::abbreviate(StockMaster::count());
        return view("components.app.dashboard", compact('sumProduct', 'chart', 'productChart', 'salesMarketingChart', 'marketSalesBranchChart'));
    }

    public function importFileExcel(Request $request)
    {
        try {
            Excel::import(new PricelistImport, $request->file('file'));
            return redirect()->back()->with("success", "Yeay, impor file anda berhasil dilakukan");

        } catch (Exception $ex) {
            return redirect()->back()->with('error','💢 Oops, data anda tidak dapat diproses. Pastikan data excel dan sistem tidak sama.');
        }

    }

    public function importStock(Request $request)
    {
        try {
            Excel::import(new StockImport, $request->file('file'));
            return redirect()->back()->with("success", "Yeay, import file anda berhasil dilakukan 🚀");

        } catch (Exception $ex) {
            return redirect()->back()->with('error','💢 Duplicate Entry, data anda tidak dapat diproses pastikan data excel dan sistem tidak sama.');
        }

    }

}
