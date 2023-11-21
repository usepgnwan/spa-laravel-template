<?php

use App\Http\Controllers\AccountController;
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
    return view('admin.index');
});
Route::get('/xxx', function () {
    $title = 'ok';
    return view('admin.pages.index', compact('title'))->render();
});
Route::get('/tes', function () {
    $title = 'testing ug.post';
    return view('admin.pages.main', compact('title'))->render();
})->name('form.tes');

Route::post('account', [AccountController::class, 'index'])->name('account.post');