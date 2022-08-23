<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectCRUDController;
use App\Http\Controllers\VendorCRUDController;
use App\Http\Controllers\ItemCRUDController;
use App\Http\Controllers\PurchaseOrderCRUDController;
use App\Http\Controllers\PurchaseRequestCRUDController;
use App\Http\Controllers\PurchaseOrderDetailCRUDController;
use App\Http\Controllers\PurchaseRequestDetailCRUDController;
use App\Http\Controllers\WarehouseCRUDController;
use App\Http\Controllers\ItemStockCRUDController;
use App\Http\Controllers\CompanyDetailRUDController;
 
Route::resource('projects', ProjectCRUDController::class);
Route::resource('vendors', VendorCRUDController::class);
Route::resource('items', ItemCRUDController::class);
Route::resource('purchaseorders', PurchaseOrderCRUDController::class);
Route::resource('purchaserequests', PurchaseRequestCRUDController::class);
Route::resource('purchaseorderdetails', PurchaseOrderDetailCRUDController::class);
Route::resource('purchaserequestdetails', PurchaseRequestDetailCRUDController::class);
Route::resource('warehouses', WarehouseCRUDController::class);
Route::resource('itemstocks', ItemStockCRUDController::class);
Route::resource('companies', CompanyDetailRUDController::class);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
