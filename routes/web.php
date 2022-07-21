<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AreaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelectProgramController;
use App\Models\Department;

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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//
Route::get('/department/{department}', [SelectProgramController::class, 'index']);

Route::controller(DepartmentController::class)->group(function(){

    Route::post('add-department','store');

    Route::get('departments','index');

    Route::post('update-department', 'update');

    Route::post('delete-department', 'destroy');

});

Route::controller(ProgramController::class)->group(function(){

    Route::post('add-program','store');

    Route::get('programs','index');

    Route::post('update-program', 'update');

    Route::post('delete-program', 'destroy');
});

Route::controller(AreaController::class)->group(function(){

    Route::post('add-area','store');

    Route::get('areas','index');

    // Route::post('update-program', 'update');

    // Route::post('delete-program', 'destroy');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
