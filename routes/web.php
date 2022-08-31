<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\KelasController;
use App\Http\Controllers\Web\TugasController;

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
		Route::get('kehadiran', [DashboardController::class, 'underconstruction'])->name('kehadiran');
		Route::get('prestasi', [DashboardController::class, 'underconstruction'])->name('prestasi');
		Route::get('buletin', [DashboardController::class, 'underconstruction'])->name('buletin');
		Route::get('pengingat', [DashboardController::class, 'underconstruction'])->name('pengingat');

		Route::group(['middleware' => ['role:guru']], function() {
			Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
			Route::get('create-kelas', [KelasController::class, 'create'])->name('create.kelas');
			Route::post('store-kelas', [KelasController::class, 'store'])->name('store.kelas');
			Route::get('edit-kelas/{id}', [KelasController::class, 'edit'])->name('edit.kelas');
			Route::put('update-kelas/{id}', [KelasController::class, 'update'])->name('update.kelas');
			Route::delete('delete-kelas/{id}', [KelasController::class, 'delete'])->name('delete.kelas');
			Route::get('delete-siswa-kelas/{id_kelas}/nim/{nomor_induk}', [KelasController::class, 'deleteStudent'])->name('delete.siswa.kelas'); // delete

			Route::get('tugas', [TugasController::class, 'index'])->name('tugas');
			Route::get('create-tugas', [TugasController::class, 'create'])->name('create.tugas');
			Route::post('store-tugas', [TugasController::class, 'store'])->name('store.tugas');
			Route::get('edit-tugas/{id}', [TugasController::class, 'edit'])->name('edit.tugas');
			Route::put('update-tugas/{id}', [TugasController::class, 'update'])->name('update.tugas');
			Route::delete('delete-tugas/{id}', [TugasController::class, 'delete'])->name('delete.tugas');
			Route::get('delete-tugas-kelas/{id}', [TugasController::class, 'deleteKelas'])->name('delete.kelas.tugas');
		});

		Route::group(['middleware' => ['role:orang_tua']], function() {
			Route::get('orangtua-kelas', [KelasController::class, 'ortuKelas'])->name('ortu.kelas');
			Route::get('orangtua-kelas/{id}', [KelasController::class, 'ortuShowKelas'])->name('ortu.show.kelas');
			Route::put('orangtua-kelas-daftar/{id}', [KelasController::class, 'ortuStoreSiswa'])->name('ortu.daftar.kelas'); // add peserta kelas

			Route::get('orangtua-tugas', [TugasController::class, 'ortuTugas'])->name('ortu.tugas');
			Route::get('orangtua-tugas/{id}', [TugasController::class, 'ortuShowTugas'])->name('ortu.show.tugas');
			Route::put('orangtua-tugas/{id}', [TugasController::class, 'ortuStoreTugas'])->name('ortu.store.tugas');
		});
	});
});