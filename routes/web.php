<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::group(['prefix' => config('routes.prefix')], function () {
    Route::resource('ProductDataManage', 'App\Http\Controllers\ProductDataController');
    Route::get('/shop_menus2/{id}', 'App\Http\Controllers\ProductDataController@getShopMenu2')->where('id', '[0-9]+');
    Route::get('/MenuSpecItems/{id}', 'App\Http\Controllers\MenuSpecItemController@index')->where('id', '[0-9]+');
    Route::get('/prod_base_search/{id}', 'App\Http\Controllers\ProductDataController@show');
    Route::get('/check_temp_skno/{id}', 'App\Http\Controllers\SStockTempController@show');
    Route::get('/spec_item_example/{spec_item_name}/{spec_item_no}/{spec_item_lang}', 
            'App\Http\Controllers\MenuSpecItemController@getSpecExample');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
