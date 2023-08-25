<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\SettingController;
use App\Http\Controllers\AdminControllers\JobpostController;
use App\Http\Controllers\AdminControllers\SliderController;
use App\Http\Controllers\ClientControllers\ClientController;
use App\Http\Controllers\ClientControllers\JobController;
use App\Http\Controllers\ClientControllers\CartController;
use App\Http\Controllers\ClientControllers\PageController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

 Route::get('/test', function () {
     dd('123');
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
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth') ;
Route::get('/logout', [DashboardController::class, 'logout'])->middleware('auth') ;

//category
Route::get('/category', [CategoryController::class, 'create'])->middleware('auth') ;
Route::post('/store-category', [CategoryController::class, 'store'])->middleware('auth') ;
Route::get('/all-category', [CategoryController::class, 'index'])->middleware('auth') ;
Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->middleware('auth') ;
Route::post('/update-category/{id}', [CategoryController::class, 'update'])->middleware('auth') ;
Route::post('/delete-category/{id}', [CategoryController::class, 'destroy'])->middleware('auth') ;

//slider
Route::resource('slider',SliderController::class)->middleware('auth') ;

//all workers
Route::get('/workers', [DashboardController::class, 'workers'])->middleware('auth') ;
Route::get('/edit-workers/{id}', [DashboardController::class, 'editworkers'])->middleware('auth') ;
Route::post('/update-workers/{id}', [DashboardController::class, 'updateworkers'])->middleware('auth') ;
Route::delete('/delete-workers/{id}', [DashboardController::class, 'destroyworkers'])->middleware('auth') ;
//all users
Route::get('/users', [DashboardController::class, 'users'])->middleware('auth') ;
Route::get('/edit-users/{id}', [DashboardController::class, 'editusers'])->middleware('auth') ;
Route::post('/update-users/{id}', [DashboardController::class, 'updateusers'])->middleware('auth') ;
Route::delete('/delete-users/{id}', [DashboardController::class, 'destroyusers'])->middleware('auth') ;


//jobpost
Route::resource('jobpost',JobpostController::class)->middleware('auth') ;
Route::get('/subscribers', [DashboardController::class, 'subscribers'])->middleware('auth');
Route::post('/delete-subscribers/{id}', [DashboardController::class, 'destroysubscribers'])->middleware('auth');

//orders
Route::get('/orders', [DashboardController::class, 'orders'])->middleware('auth') ;
Route::get('/order-synced/{id}', [DashboardController::class, 'sync']);
Route::get('/order-update/{id}', [DashboardController::class, 'update']);
Route::get('/order-remove/{id}', [DashboardController::class, 'cancel']);
//page create
Route::get('/create-page', [\App\Http\Controllers\AdminControllers\PageController::class, 'create'])->middleware('auth');
Route::post('/store-page', [\App\Http\Controllers\AdminControllers\PageController::class, 'store'])->middleware('auth');
Route::get('/all-page', [\App\Http\Controllers\AdminControllers\PageController::class, 'index'])->name('admin.page')->middleware('auth');
Route::get('/edit-page/{id}', [\App\Http\Controllers\AdminControllers\PageController::class, 'edit'])->middleware('auth');
Route::post('/update-page/{id}', [\App\Http\Controllers\AdminControllers\PageController::class, 'update'])->middleware('auth');
Route::delete('/delete-page/{id}', [\App\Http\Controllers\AdminControllers\PageController::class, 'destroy'])->middleware('auth');
//Route::get('/admin/all-post', [JobpostController::class, 'index']);

//client routes...
Route::get('/', [ClientController::class, 'home']);
Route::get('/client/login', [ClientController::class, 'login'])->name('cllogin');

Route::post('/client/logincheck', [ClientController::class, 'logincheck']);
Route::get('/client/signup', [ClientController::class, 'register']);
Route::post('/client/registration', [ClientController::class, 'registration']);
Route::get('/client/logout', [ClientController::class, 'logout']);
Route::get('/jobpostbycat/{category}', [\App\Http\Controllers\ClientControllers\JobController::class, 'productbycat'])->name('hello');
Route::get('/all-jobs', [\App\Http\Controllers\ClientControllers\JobController::class, 'alljob']);
Route::get('/job-details/{id}', [\App\Http\Controllers\ClientControllers\JobController::class, 'viewdetails']);

Route::post('/add_cart/{id}', [\App\Http\Controllers\ClientControllers\CartController::class, 'add_cart']);
Route::get('/hiring-info', [CartController::class, 'view_cart']);
Route::get('/delete_cart/{id}', [\App\Http\Controllers\ClientControllers\CartController::class, 'delete_cart']);
//subscribe
Route::post('/subscribe-us', [ClientController::class, 'subscribe'])->name('subscribe.us');

// Route::get('/pages', [PageController::class, 'indexpage']);



Route::get('/pages/{pageSlug}', [PageController::class, 'indexpage']);
Route::get('/profile', [ClientController::class, 'profile']);
Route::get('/webite_setup', [SettingController::class, 'index'])->name('admin.setting');
Route::post('/update-setting', [SettingController::class, 'update'])->name('admin.update.setting');
//jobpost
Route::get('/find-job', [\App\Http\Controllers\ClientControllers\JobController::class, 'findjob']);
Route::post('/job-request', [\App\Http\Controllers\ClientControllers\JobController::class, 'jobrequest']);

// SSLCOMMERZ Start
Route::get('/bill', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/bill2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
Route::group(['middleware' => ['customAuth']], function () {

    // Payment Routes for bKash
    Route::post('bkash/get-token', 'BkashController@getToken')->name('bkash-get-token');
    Route::post('bkash/create-payment', 'BkashController@createPayment')->name('bkash-create-payment');
    Route::post('bkash/execute-payment', 'BkashController@executePayment')->name('bkash-execute-payment');
    Route::get('bkash/query-payment', 'BkashController@queryPayment')->name('bkash-query-payment');
    Route::post('bkash/success', 'BkashController@bkashSuccess')->name('bkash-success');

    // Refund Routes for bKash
    Route::get('bkash/refund', 'BkashRefundController@index')->name('bkash-refund');
    Route::post('bkash/refund', 'BkashRefundController@refund')->name('bkash-refund');
});

