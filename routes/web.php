<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\JobpostController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


//admin controller start...
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/logout', [DashboardController::class, 'logout']);

//category
Route::get('/category', [CategoryController::class, 'create']);
Route::post('/store-category', [CategoryController::class, 'store']);
Route::get('/all-category', [CategoryController::class, 'index']);
Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
Route::post('/update-category/{id}', [CategoryController::class, 'update']);
Route::post('/delete-category/{id}', [CategoryController::class, 'destroy']);

//all workers
Route::get('/workers', [DashboardController::class, 'workers']);
Route::get('/edit-workers/{id}', [DashboardController::class, 'editworkers']);
Route::post('/update-workers/{id}', [DashboardController::class, 'updateworkers']);
Route::delete('/delete-workers/{id}', [DashboardController::class, 'destroyworkers']);
//all users
Route::get('/users', [DashboardController::class, 'users']);
Route::get('/edit-users/{id}', [DashboardController::class, 'editusers']);
Route::post('/update-users/{id}', [DashboardController::class, 'updateusers']);
Route::delete('/delete-users/{id}', [DashboardController::class, 'destroyusers']);


//jobpost
Route::resource('jobpost',JobpostController::class)->middleware('auth') ;
//Route::get('/admin/all-post', [JobpostController::class, 'index']);



