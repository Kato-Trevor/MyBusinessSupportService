<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HisController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
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
use App\Http\Controllers\HomeController;
Route::get('/items', function(){
	return view('welcome');
});
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::post('/booked', [ProductController::class, 'booked']);

Route::get('/customer-home', [HomeController::class, 'index'])->name('customer-home');
Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin')->middleware('is_admin');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::get('/customer-home', [CustomerController::class, 'home']);

Route::get('/trial/{id}', [ParticipantController::class, 'show']);

Route::get('/products', [CustomerController::class, 'index']);
Route::get('/customer-products', [ProductController::class, 'index2']);
Route::get('/customer-tables', [CustomerController::class, 'index2']);

Route::get('/participant-tables', [ParticipantController::class, 'index2']);

// Route::get('/admin', [AdminController::class, 'index']);

Route::get('/participant-graphs', [ParticipantController::class, 'index']);

Route::get('/products-graphs', [ProductController::class, 'index']);

// Route::get('/home', [ParticipantController::class, 'index']);
Route::post('/administrator', [AdministratorController::class, 'index']);

Route::post('/products-add', [ProductController::class, 'store']);
Route::get('/products-add', [ProductController::class, 'create']);
Route::get('/page1', [ProductController::class, 'index']);
Route::get('/page2', function(){
return view('MyPages.page2');
})->name('page2');
//Route::get('/blog',[MyController::class, 'index']);

// Route::get('/about', function () {
//     return 'about us';
// });

// Route::get('/users/{id}/{company}', function ($id, $comp) {
//     return "User is:".$id." Company name: ".$comp;
// });
//Route::get('')

Route::get('/', function(){
	return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
// });


Auth::routes();

// Route::get('/home', [App\Http\Controllers\ParticipantController::class, 'index'])->name('home');
Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('participant-tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\ParticipantController@index2']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

