<?php

namespace App\Http\Controllers;

use App\Imports\PricelistImport;
use App\Models\Inventory\StockMaster;
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
        $sumProduct = StockMaster::count();
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
}
