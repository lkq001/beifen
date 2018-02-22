<?php

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

Auth::routes();

Route::group(['namespace' => 'Home'], function () {
    // 后台首页
    Route::get('/', 'IndexController@index')->name('home.index.index');

    Route::get('/pages/company', 'PagesController@company')->name('home.pages.company');
    Route::get('/pages/brand', 'PagesController@brand')->name('home.pages.brand');
    Route::get('/pages/base', 'PagesController@base')->name('home.pages.base');
    // 评价
    Route::get('/pages/evaluate', 'PagesController@evaluate')->name('home.evaluate.index');

    Route::post('/pages/evaluate/store', 'PagesController@evaluateStore')->name('home.evaluate.store');
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    // 后台首页
    Route::get('/index', 'IndexController@index')->name('admin.index.index');

    // 王泽林追溯系统
    Route::get('/trace/index', 'TraceController@index')->name('admin.trace.index');
    Route::get('/trace/add', 'TraceController@add')->name('admin.trace.add');
    Route::post('/trace/store', 'TraceController@store')->name('admin.trace.store');
    Route::get('/trace/edit', 'TraceController@edit')->name('admin.trace.edit');
    Route::post('/trace/update', 'TraceController@update')->name('admin.trace.update');

    Route::get('/pages/index', 'PagesController@index')->name('admin.pages.index');
    Route::get('/pages/add', 'PagesController@add')->name('admin.pages.add');
    Route::get('/pages/edit', 'PagesController@edit')->name('admin.pages.edit');
    Route::post('/pages/store', 'PagesController@store')->name('admin.pages.store');
    Route::post('/pages/update', 'PagesController@update')->name('admin.pages.update');


    Route::get('/evaluate/index', 'EvaluateController@index')->name('admin.evaluate.index');
    Route::get('/logout', 'LoginController@logout')->name('admin.login.out');
});

