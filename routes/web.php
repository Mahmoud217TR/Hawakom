<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories', [App\Http\Controllers\Controller::class, 'categories']);
Route::get('/cate_show/{id}', [App\Http\Controllers\Controller::class, 'cate_show']);
Route::get('/search/',[App\Http\Controllers\Controller::class, 'search'])->name('search');
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/resshow/{id}', [App\Http\Controllers\Controller::class, 'resshow']);
Route::get('/mostvisited', [App\Http\Controllers\Controller::class, 'mostvisitedshow']);
Route::get('/report', [App\Http\Controllers\Controller::class, 'reportshow']);
Route::post('/reportsubmit', [App\Http\Controllers\Controller::class, 'reportsub']);

Route::middleware('admin')->group(function () {
    Route::get('/adminspanel', [App\Http\Controllers\AdminController::class, 'panel']);
    Route::get('/addcateshow', [App\Http\Controllers\AdminController::class, 'addcateshow']);
    Route::post('/addcat', [App\Http\Controllers\AdminController::class, 'addcat']);
    Route::get('/resreqshow', [App\Http\Controllers\AdminController::class, 'resreqshow']);
    Route::get('/resreqacc/{id}', [App\Http\Controllers\AdminController::class, 'resreqacc']);
    Route::get('/resreqden/{id}', [App\Http\Controllers\AdminController::class, 'resreqden']);
    Route::get('/resreqfullshow/{id}', [App\Http\Controllers\AdminController::class, 'resreqfullshow']);
    Route::get('/showallres', [App\Http\Controllers\AdminController::class, 'showallres']);
    Route::get('/reportshowing', [App\Http\Controllers\AdminController::class, 'reportshowing']);
    Route::get('/reportshow/{id}', [App\Http\Controllers\AdminController::class, 'reportshowid']);
    Route::get('/delreport/{id}', [App\Http\Controllers\AdminController::class, 'delreport']);
    Route::get('/removeuser/{id}', [App\Http\Controllers\AdminController::class, 'removeuser']);
    Route::get('/archiveres/{id}', [App\Http\Controllers\AdminController::class, 'archiveres']);
    Route::get('/unarchiveres/{id}', [App\Http\Controllers\AdminController::class, 'unarchiveres']);
});

Route::middleware('owner')->group(function () {
    Route::get('/addsiteshow', [App\Http\Controllers\OwnerController::class, 'addsiteshow']);
    Route::post('/addsite', [App\Http\Controllers\OwnerController::class, 'addsite']);
    Route::get('/addperiodsshow/{id}/{num}', [App\Http\Controllers\OwnerController::class, 'addperiodsshow']);
    Route::post('/addperiods', [App\Http\Controllers\OwnerController::class, 'addperiods']);
    Route::get('/myresshow/{id}', [App\Http\Controllers\OwnerController::class, 'myresshow']);
    Route::get('/myresreqshow/{id}/{idr}', [App\Http\Controllers\OwnerController::class, 'myresreqshow']);
    Route::get('/reqacc/{id}', [App\Http\Controllers\OwnerController::class, 'reqacc']);
    Route::get('/reqden/{id}', [App\Http\Controllers\OwnerController::class, 'reqden']);
    Route::get('/resdel/{id}', [App\Http\Controllers\OwnerController::class, 'resdel']);
    Route::get('/reseditshow/{id}', [App\Http\Controllers\OwnerController::class, 'reseditshow']);
    Route::post('/resedit/{id}', [App\Http\Controllers\OwnerController::class, 'resedit']);
    Route::get('/editperiodsshow/{id}', [App\Http\Controllers\OwnerController::class, 'editperiodsshow']);
    Route::post('/editperiods', [App\Http\Controllers\OwnerController::class, 'editperiods']);
    Route::get('/delperiod/{id}', [App\Http\Controllers\OwnerController::class, 'delperiod']);
    Route::post('/addeditperiods', [App\Http\Controllers\OwnerController::class, 'addeditperiods']);
});

Route::middleware('customer')->group(function () {
    Route::get('/reqresortshow/{id}', [App\Http\Controllers\CustomerController::class, 'reqresortshow']);
    Route::post('/reqresort/{id}', [App\Http\Controllers\CustomerController::class, 'reqresort']);
    Route::get('/myres/{id}', [App\Http\Controllers\CustomerController::class, 'showmyres']);
    Route::get('/mycurrentres/{id}', [App\Http\Controllers\CustomerController::class, 'showmycurrentres']);
    Route::get('/gback/{id}', [App\Http\Controllers\CustomerController::class, 'gback']);
    Route::get('/cancel/{id}', [App\Http\Controllers\CustomerController::class, 'cancel']);
    Route::get('/rateshow/{id}', [App\Http\Controllers\CustomerController::class, 'rateshow']);
    Route::post('/rate', [App\Http\Controllers\CustomerController::class, 'rate']);
});