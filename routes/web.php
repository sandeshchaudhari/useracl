<?php

use Illuminate\Support\Facades\Auth;


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
    return redirect('login');

});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');

});
Route::get('/dashboard','DashboardController@index')->name('dashboard');



 //User Project Midddleware
Route::group(['middleware' => ['role_or_permission:admin|superadmin']], function () {
     
    Route::get('/user','Admin\UserController@index')->name('user.index');
    Route::get('/project','Admin\ProjectController@index')->name('project.index');
    Route::post('/change/project/status','Admin\ProjectController@changeProjectStatus')->name('project.status');
    
});

Route::group(['middleware' => ['role_or_permission:superadmin']], function () {

    //User routes
    // Route::get('/user','Admin\UserController@index')->name('user.index');
    Route::get('/user/create','Admin\UserController@create')->name('user.create');
    Route::post('/user','Admin\UserController@store')->name('user.store');
    Route::get('/user/{user}/edit','Admin\UserController@edit')->name('user.edit');
    Route::put('/user/{user}/update','Admin\UserController@update')->name('user.update');
    Route::delete('/user/{user}/delete','Admin\UserController@destroy')->name('user.destroy');


    //Project Routes
    // Route::get('/project','Admin\ProjectController@index')->name('project.index');
    Route::get('/project/create','Admin\ProjectController@create')->name('project.create');
    Route::post('/project','Admin\ProjectController@store')->name('project.store');
    Route::get('/project/{project}/edit','Admin\ProjectController@edit')->name('project.edit');
    Route::put('/project/{project}/update','Admin\ProjectController@update')->name('project.update');
    Route::delete('/project/{project}/delete','Admin\ProjectController@destroy')->name('project.destroy');

   

});







