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
    //return view('welcome');
    return redirect()->route('login');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', function () {
       	return redirect()->route('matriculas.index');
	});


	Route::resource('alunos', 'StudentsController');
	Route::resource('cursos', 'CoursesController');
	Route::resource('matriculas', 'RegistrationsController');
	Route::get('matriculas/valor/{id}/{type}','RegistrationsController@getValueCourse');

	Route::group(['prefix'=>'pagamentos'], function(){
		
		Route::get('create/{registration_id}', ['as' => 'pagamentos.create', 'uses' => 'PaymentsController@create']);
		Route::post('store', ['as' => 'pagamentos.store', 'uses' => 'PaymentsController@store']);
		
	});	


    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
