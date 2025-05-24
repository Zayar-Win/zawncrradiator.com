<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    return view('welcome');
});

// Route::resource('/user','App\Http\Controllers\UserDashboardController');
// Route::get('/user/{id}/photo',[App\Http\Controllers\UserDashboardController::class, 'photo']);
// Route::resource('/admin','App\Http\Controllers\AdminDashboardController');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/item', 'App\Http\Controllers\ItemController');
    Route::get('/item/{id}/photo', [App\Http\Controllers\ItemController::class, 'photo']);
    ///////////////////////////////////////////////////////
    Route::resource('daily_history', 'App\Http\Controllers\DailyHistoryController');
    Route::get('/search_daily_history', [App\Http\Controllers\DailyHistoryController::class, 'search_daily_history'])->name('search_daily_history');

    ////////////////////////////////////////////////////////////
    Route::get('/order/{id}/destroy', [App\Http\Controllers\OrderController::class, 'destroy']);
    Route::delete('/order/{id}/delete', [App\Http\Controllers\OrderController::class, 'delete']);
    Route::get('/order/{id}/search_delete', [App\Http\Controllers\OrderController::class, 'search_delete']);
    Route::get('/order/{id}/details', [App\Http\Controllers\OrderController::class, 'details']);
    Route::get('/order/{id}/order_details_print', [App\Http\Controllers\OrderController::class, 'order_details_print']);
    ///////////////////////////////////////////////////////////////////////////
    Route::get('/search', [App\Http\Controllers\ItemController::class, 'search_item']);
    Route::get('/order/history', [App\Http\Controllers\OrderController::class, 'history']);
    Route::get('/tank_order/history', [App\Http\Controllers\Tank_OrderController::class, 'history']);
    Route::post('/order/{id}/store', [App\Http\Controllers\OrderController::class, 'store']);
    Route::get('/order/{id}/print', [App\Http\Controllers\OrderController::class, 'print_item'])->name('print');
    Route::get('/search_order', [App\Http\Controllers\OrderController::class, 'search_order'])->name('search_order');
    Route::resource('/order', 'App\Http\Controllers\OrderController');
    Route::resource('/tank', 'App\Http\Controllers\TankController');
    Route::get('/tank/{id}/photo', [App\Http\Controllers\TankController::class, 'photo']);

    Route::get('/search_tank', [App\Http\Controllers\TankController::class, 'search_tank']);
    Route::resource('/tank_order', 'App\Http\Controllers\Tank_OrderController');

    Route::post('/tank_order/{id}/store', [App\Http\Controllers\Tank_OrderController::class, 'store']);
    Route::get('/tank_order/{id}/print', [App\Http\Controllers\Tank_OrderController::class, 'print_tank'])->name('print');
    Route::get('/search_order_tank', [App\Http\Controllers\Tank_OrderController::class, 'search_order'])->name('search_order_tank');
    Route::get('/search_debt', [App\Http\Controllers\DebtController::class, 'search_debt'])->name('search_debt');
    Route::get('/debt/{id}/destroy', [App\Http\Controllers\DebtController::class, 'destroy']);
    Route::resource('/daily_usage', 'App\Http\Controllers\DailyUsageController');
    Route::resource('/debt', 'App\Http\Controllers\DebtController');
    Route::get('/debt/{id}/debt_list', [App\Http\Controllers\DebtController::class, 'debt_list']);
    Route::delete('/debt/{id}/delete', [App\Http\Controllers\DebtController::class, 'delete']);


    Route::get('/search_daily', [App\Http\Controllers\DailyUsageController::class, 'search_daily']);


    Route::post('/order/{id}/store_user', [App\Http\Controllers\OrderController::class, 'store_user']);
    Route::post('/tank_order/{id}/store_user', [App\Http\Controllers\Tank_OrderController::class, 'store_user']);


    Route::get('/item/{id}/foreign_order', [App\Http\Controllers\ForeignOrderController::class, 'foreign_order']);
    Route::get('foreign_item_view', [App\Http\Controllers\ForeignOrderController::class, 'foreign_item_view']);
    Route::get('foreign_joka_view', [App\Http\Controllers\ForeignOrderController::class, 'foreign_joka_view']);
    Route::get('foreign_tk_view', [App\Http\Controllers\ForeignOrderController::class, 'foreign_tk_view']);

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::post('/foreign_item_order_create', [App\Http\Controllers\ForeignOrderController::class, 'foreign_item_order_create']);
    Route::post('/foreign_joka_order_create', [App\Http\Controllers\ForeignOrderController::class, 'foreign_joka_order_create']);
    Route::post('/foreign_tk_order_create', [App\Http\Controllers\ForeignOrderController::class, 'foreign_tk_order_create']);


    Route::post('/message', [App\Http\Controllers\ForeignOrderController::class, 'message']);


    Route::get('/foreign_item_view/{id}/edit', [App\Http\Controllers\ForeignOrderController::class, 'edit']);
    Route::delete('/foreign_item_view/{id}/destroy', [App\Http\Controllers\ForeignOrderController::class, 'destroy']);
    Route::put('/foreign_item_view/{id}/update', [App\Http\Controllers\ForeignOrderController::class, 'update']);

    Route::get('/foreign_joka_view/{id}/edit', [App\Http\Controllers\ForeignOrderController::class, 'joka_edit']);
    Route::delete('/foreign_joka_view/{id}/destroy', [App\Http\Controllers\ForeignOrderController::class, 'joka_destroy']);
    Route::put('/foreign_joka_view/{id}/update', [App\Http\Controllers\ForeignOrderController::class, 'joka_update']);

    Route::get('/foreign_tk_view/{id}/edit', [App\Http\Controllers\ForeignOrderController::class, 'tk_edit']);
    Route::delete('/foreign_tk_view/{id}/destroy', [App\Http\Controllers\ForeignOrderController::class, 'tk_destroy']);
    Route::put('/foreign_tk_view/{id}/update', [App\Http\Controllers\ForeignOrderController::class, 'tk_update']);



    Route::get('foreign_history', [App\Http\Controllers\ForeignOrderController::class, 'history']);
    Route::delete('/history_delete/{id}', [App\Http\Controllers\ForeignOrderController::class, 'history_delete']);

    Route::get('/message_view', [App\Http\Controllers\ForeignOrderController::class, 'message_view']);
    Route::get('/message_photo/{id}', [App\Http\Controllers\ForeignOrderController::class, 'message_photo']);
    Route::delete('/message_delete/{id}', [App\Http\Controllers\ForeignOrderController::class, 'message_delete']);

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
