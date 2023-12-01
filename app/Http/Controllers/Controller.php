<?php

namespace App\Http\Controllers;

use App\Helpers\AbbreviateNumber;
use App\Imports\PricelistImport;
use App\Imports\StockImport;
use App\Models\Inventory\StockMaster;
use App\Models\Transaction\Sppb;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function index()
    {
        $sumProduct = AbbreviateNumber::abbreviate(StockMaster::count());
        return view("components.app.dashboard", compact("sumProduct"));
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
