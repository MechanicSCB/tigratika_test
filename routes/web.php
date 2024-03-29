<?php

use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/xml-parse', [\App\Actions\ParseXmlAndSaveToJson::class, 'run'])->name('xml.parse.');
Route::get('/products/export', [ProductController::class, 'export']);
Route::get('/', [ProductController::class,'index'])->name('products.index');

