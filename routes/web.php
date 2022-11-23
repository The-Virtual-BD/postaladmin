<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamMemberController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
Route::group(['middleware' => ['auth']], function() {

    // Home controller
    Route::get('/', [HomeController::class,'index'])->name('index');


    // Vacancies routs
    Route::resource('vacancies', VacancyController::class);

    // Settings routs
    Route::resource('settings', SettingController::class);

    // Galary routs
    Route::resource('galleries', GalleryController::class);


    // User routs
    Route::resource('users', UserController::class);


    // Location controller
    Route::resource('locations', LocationController::class);

    // Team Member route
    Route::resource('teamMembers', TeamMemberController::class);




    // Role routs
    Route::resource('roles', RoleController::class);
    // Permission routs
    Route::resource('permissions', PermissionController::class);


    Route::get('fp', function ()
    {
        return view('fp');
    })->name('flightPlanner');

    // Profile
    Route::controller(ProfileController::class)->prefix('profiles')->group(function () {
        Route::get('/', 'index')->name('myprofile');
        Route::get('/edit', 'edit')->name('editprofile');
        Route::post('/update/{user}', 'update')->name('updateprofile');
    });

});