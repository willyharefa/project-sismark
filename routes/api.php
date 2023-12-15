<?php

use App\Models\Transaction\InvoiceToSppb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/testing', function() {
    $data = InvoiceToSppb::where('invoice_id', 1)->with('sppb_item')->get();
    $sumQty = null;

    // return response()->json(['value'=>$data]);
    // $value = null;
    foreach ($data as $item) {
        foreach ($item->sppb_item as $value) {
            return response()->json(['value'=>$item]);
        }
        
        
    }


});