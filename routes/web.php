<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelectProgramController;
use App\Http\Controllers\TableInfoController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\AccreditorPageController;

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

Route::get('/department-home', function () {
    return view('frames/landing');
});

require __DIR__.'/auth.php';

//
Route::get('/department/{department}', [SelectProgramController::class, 'index']);

Route::controller(DepartmentController::class)->group(function(){

    Route::post('add-department','store');

    Route::get('departments','index');

    Route::post('update-department', 'update');

    Route::post('delete-department', 'destroy');

});

Route::controller(AccountSettingsController::class)->group(function(){

    Route::get('account-settings','index');

    Route::post('update-account', 'update');

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

    Route::post('update-area', 'update');

    Route::post('delete-area', 'destroy');
});

Route::controller(TemplateController::class)->group(function(){

    Route::post('add-columnn','store');

    Route::get('templates/{area}/{reportType}','index');

    Route::post('update-column', 'update');

    Route::post('delete-column', 'destroy');
});

Route::controller(TableInfoController::class)->group(function(){

    Route::post('add-row','store');

    Route::get('table_info/{program}/{area}/{reportType}','index');

    Route::post('update-cell', 'update');

    Route::post('delete-row', 'destroy');
});

Route::controller(PublishController::class)->group(function(){

    Route::post('add-comment','store');

    Route::get('comments/{area}/{report}','index');

    // Route::post('update-cell', 'update');

    Route::post('delete-comment', 'destroy');
});

Route::controller(AccreditorPageController::class)->group(function(){

    Route::get('accreditor/{department}/{report}','index');

    // Route::get('accreditor-page/{program}/{area}/{report}','index');
});

Route::controller(UserSettingController::class)->group(function(){

    Route::post('add-user','store');

    Route::get('user-setting','index');

    Route::post('update-user', 'update');

    Route::post('delete-user', 'destroy');
});

Route::get('/file-manager', function () {
    return view('admin/file-manager');
})->name('file-manager');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
