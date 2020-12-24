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
    return view('index');
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::post('/subscribstore', 'HomeController@subscribstore');
Route::post('/', 'HomeController@store');
Route::get('/thankyou', 'HomeController@thankyou');

Route::resource('blogs', 'BlogsController')->only([
    'index', 'show'
]);

Route::get('/blogs/search/{slug}', 'BlogsController@search')->name('index');

Route::resource('careers', 'CareersController')->only([
    'index', 'show'
]);

Route::get('/careers/test/{id}', 'CareersController@test')->name('test');

Route::resource('projects', 'ProjectsController')->only([
    'index', 'show'
]);

Auth::routes([
    'register' => true, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/home', 'AdminMessagesController@home')->name('home');

Route::get('/applicants/{id}', 'ApplicantsController@show')->name('applicants');
Route::post('/apply', 'ApplicantsController@upload');
Route::get('/apply', 'ApplicantsController@redirect');

Route::post('/application', 'ApplicantsController@application');

Route::prefix('admin')->group(function(){
    Route::middleware('checkContent')->group(function () {
        Route::resource('projects', 'AdminProjectsController');;
        Route::resource('blogs', 'AdminBlogsController');
        Route::resource('newsletters', 'AdminSubscribeController');
        Route::get('/newsletters/sendall/{id}', 'AdminSubscribeController@sendEmailAll');
        Route::get('/messages', 'AdminMessagesController@index');
        Route::get('/messages/{month}/{year}', 'AdminMessagesController@time');
        Route::get('/messages/all', 'AdminMessagesController@all');
        Route::get('/confirmmessage/{id}', 'AdminMessagesController@confirm');
    });
    Route::middleware('checkHR')->group(function () {
        Route::resource('careers', 'AdminCareersController');
        Route::get('/careers/sendall/{id}', 'AdminCareersController@sendEmailAll');
        Route::get('/applicants', 'AdminApplicantsController@index');
        Route::get('/applicants/{id}', 'AdminApplicantsController@show');
        Route::get('/applicants/specific/{id}', 'AdminApplicantsController@showapplicant');
        Route::get('/search', 'AdminApplicantsController@search')->name('admin.search');
        Route::get('/changestatus', 'AdminApplicantsController@changestatus')->name('admin.changestatus');
    });
});

Route::get('lang/{locale}', function ($locale){
    session()->put('locale', $locale);
    return redirect()->back();
});



Route::get('/sorry/{id}', 'SendMailController@sorry');
Route::get('/privacy-policy', 'SendMailController@privacy');
Route::get('/career/unsubscribe/{id}', 'SendMailController@unsubcar');

