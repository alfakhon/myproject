<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\IncomeController;

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
route::view('index','index');

route::resource('cat',CatController::class);
route::resource('color',ColorController::class);
route::resource('type',TypeController::class);
route::resource('income',IncomeController::class);
    
Route::get('plus/{id}', [IncomeController::class, 'plus'])->name('plus');
Route::post('plus/{id}', [IncomeController::class, 'plus'])->name('plus');
Route::get('plusstore', [IncomeController::class, 'plusstore'])->name('plusstore');
Route::post('plusstore', [IncomeController::class, 'plusstore'])->name('plusstore');

Route::get('minus/{id}', [IncomeController::class, 'minus'])->name('minus');
Route::post('minus/{id}', [IncomeController::class, 'minus'])->name('minus');
Route::get('minusstore', [IncomeController::class, 'minusstore'])->name('minusstore');
Route::post('minusstore', [IncomeController::class, 'minusstore'])->name('minusstore');


Route::get('full/{id}', [IncomeController::class, 'full']);
route::post('create', [CatController::class, 'create'])->name('create');
route::post('create', [ColorController::class, 'create'])->name('create');
route::post('store', [ColorController::class, 'store'])->name('store');

route::post('delincome', [IncomeController::class, 'delincome'])->name('delincome');

    
route::post('edit', [CatController::class, 'edit'])->name('edit');
route::post('update', [CatController::class, 'update'])->name('update');

route::get('catsel', [IncomeController::class, 'catsel'])->name('catsel');

route::get('sarUp', [IncomeController::class, 'sarUp'])->name('sarUp');
route::get('sarDown', [IncomeController::class, 'sarDown'])->name('sarDown');
route::get('search', [IncomeController::class, 'search'])->name('search');

route::get('sanaajax', [IncomeController::class, 'sanaajax'])->name('sanaajax');

route::get('stat', [IncomeController::class, 'stat'])->name('stat');