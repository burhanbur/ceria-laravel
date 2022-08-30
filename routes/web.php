<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\KelasController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('bulletin', [HomeController::class, 'bulletin'])->name('bulletin');
Route::get('about', [HomeController::class, 'about'])->name('about');

Route::group(['middleware' => ['auth'], 'prefix' => 'cpanel'], function() {
	Route::get('dashboard', [DashboardController::class, 'index'])->name('home');


	Route::group(['as' => 'cpanel.'], function() {
		Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
		Route::get('create-kelas', [KelasController::class, 'create'])->name('create.kelas');
		Route::post('store-kelas', [KelasController::class, 'store'])->name('store.kelas');
		Route::get('show-kelas/{id}', [KelasController::class, 'show'])->name('show.kelas');
		Route::get('edit-kelas/{id}', [KelasController::class, 'edit'])->name('edit.kelas');
		Route::put('update-kelas/{id}', [KelasController::class, 'update'])->name('update.kelas');
		Route::delete('delete-kelas/{id}', [KelasController::class, 'delete'])->name('delete.kelas');
	});

	Route::group(['middleware' => ['role:admin']], function() {

	});

	Route::group(['middleware' => ['role:orang_tua']], function() {
		
	});

	Route::group(['middleware' => ['role:siswa']], function() {
		
	});

	Route::group(['middleware' => ['role:guru']], function() {
		
	});
});