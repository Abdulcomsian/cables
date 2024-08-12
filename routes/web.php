<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProviderDetailController,ProviderController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('broadband');
// });
Route::get('/', [ProviderController::class,'index'])->name('home');
Route::get('/importfile', [ProviderDetailController::class,'importFile'])->name('importFile');
Route::get('/upload', [ProviderDetailController::class, 'showUploadForm'])->name('excel.uploadform');
Route::post('/import', [ProviderDetailController::class, 'import'])->name('excel.import');
Route::get('/broadband-providers', [ProviderController::class, 'ManageProviders']);
Route::post('/submit-provider', [ProviderController::class, 'AddProvider'])->name('submit.provider');
Route::get('/load-more-data', [ProviderController::class,'loadMoreData'])->name('load.more');
Route::post('/filter', [ProviderController::class,'getFIlteredProvider'])->name('apply.filter');
Route::post('/moreinfo', [ProviderController::class,'getMoreInfo'])->name('apply.moreinfo');
Route::get('/test' , [ProviderController::class , 'testApi']);
