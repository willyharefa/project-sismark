<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Inventory\StockMasterController;
use App\Http\Controllers\Partner\CustomerController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Sales\PricelistController;
use App\Http\Controllers\TaskManagement\ProgressController;
use App\Http\Controllers\TaskManagement\ActivityController;
use App\Http\Controllers\Transaction\PoInternalController;
use App\Http\Controllers\Transaction\PoInternalItemController;
use App\Http\Controllers\Transaction\QuotationController;
use App\Http\Controllers\UserManagement\SalesUserController;
use App\Http\Controllers\UserManagement\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [Controller::class, 'index'])->name('index');

Route::resource("stock-master", StockMasterController::class);
Route::post('/stock-import', [Controller::class, 'importStock'])->name('importStock');
Route::get('/all-product', [ReportController::class, 'allProducts'])->name('allProducts');

Route::resource('user', UserController::class);
Route::resource('sales-user', SalesUserController::class);
Route::resource('customer', CustomerController::class);


Route::resource('activities', ActivityController::class);
Route::get('/work-progress/{activity}', [ProgressController::class, 'createProgress'])->name('createProgress');
Route::resource('progress', ProgressController::class);

Route::resource('quotation', QuotationController::class);
Route::post('/quotation/item', [QuotationController::class, 'storeItemQuo'])->name('storeItemQuo');
Route::post('quotation/{quotation}/product', [QuotationController::class, 'submitQuotation'])->name('submitQuotation');
Route::get('/quotation-print/{quotation}', [ReportController::class, 'quotationPrint'])->name('quotationPrint');

Route::get('/product-pricelist/{id}', [QuotationController::class, 'getProduct'])->name('getProduct');
Route::get('/quotation-form/{activity}', [QuotationController::class, 'quotationForm'])->name('quotationForm');

Route::resource('pricelist', PricelistController::class);
Route::post('/pricelist-excel', [Controller::class, 'importFileExcel'])->name('importFileExcel');

Route::get('/all-pricelist', [ReportController::class, 'allPricelist'])->name('allPricelist');

Route::resource('po-internal', PoInternalController::class);
Route::put('po-internal-item/{id}/submit', [PoInternalController::class, 'poInternalSubmit'])->name('poInternalSubmit');
Route::get('po-internal-print/{id}', [ReportController::class, 'printPoInternal'])->name('printPoInternal');

Route::resource('po-internal-item', PoInternalItemController::class);