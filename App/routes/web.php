<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

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
    return view('home');
});

Auth::routes();

// Home
Route::get('/dashboard', 'AdminController@index')->name('dashboard');

//Add details
Route::get('/details','AdminController@add_details')->name('customer_details');

//Edit-Profile
Route::get('/profile','AdminController@profile')->name('profile');

//Reports
Route::get('/reports','UserController@reports')->name('reports');

//Settings
Route::get('/block_users','AdminController@block_user')->name('block-user');

//View-Customers
Route::get('/view_customer','AdminController@view_customer')->name('view-customer');

//get-customer_details
Route::post('/details','AdminController@insert')->name('customer_details');

 //update details
Route::post('/view_customer','AdminController@update_data');

  //delete details
Route::post('/view_customer1','AdminController@delete')->name('view_customer_delete');

//get payers
Route::get('/payment','AdminController@payment')->name('payers');

//mark payments
Route::post('/payment/mark_payments','AdminController@loadSheet')->name('mark_payments');

//save weekly_payment
Route::post('/payment/mark_payment/weekly','AdminController@weekly_save')->name('weekly');

//save daily payment
Route::post('/payment/mark_payment/daily','AdminController@daily_save')->name('daily');

//reset password
Route::post('/profile/reset_password','UserController@reset_password')->name('reset');

//block users
Route::post('/block_users/add','AdminController@add_block_user')->name('add-block-user');

//get-reports
Route::get('/get-pdf','UserController@pdf')->name('pdf');




