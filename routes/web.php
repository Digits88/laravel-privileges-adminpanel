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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    Route::get('home', 'HomeController@index')->name('home');

    $objects = ['users', 'permissions', 'roles'];

    foreach ($objects as $object) {
        Route::get("$object", ucfirst(str_singular($object))."Controller@index")->middleware("permission:browse $object")->name("{$object}");
        Route::get("$object/datatable", ucfirst(str_singular($object))."Controller@datatable")->middleware("permission:browse $object")->name("{$object}.datatable");
        Route::get("$object/add", ucfirst(str_singular($object))."Controller@add")->middleware("permission:add $object")->name("{$object}.add");
        Route::post("$object/create", ucfirst(str_singular($object))."Controller@create")->middleware("permission:add $object")->name("{$object}.create");
        Route::get("$object/{id}/edit", ucfirst(str_singular($object))."Controller@edit")->middleware("permission:edit $object")->name("{$object}.edit");
        Route::post("$object/{id}/update", ucfirst(str_singular($object))."Controller@update")->middleware("permission:edit $object")->name("{$object}.update");
        Route::get("$object/{id}/delete", ucfirst(str_singular($object))."Controller@delete")->middleware("permission:delete $object")->name("{$object}.delete");
        Route::get("$object/{id}", ucfirst(str_singular($object))."Controller@view")->middleware("permission:view $object")->name("{$object}.view");
    }

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
