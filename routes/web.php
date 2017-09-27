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
//Route::resource('/painel', 'PainelController');
//Route::resource('/painel', 'PainelController');


Route::group(['prefix' => 'painel'], function(){
    Route::get('/cadastrar', 'UsuarioController@create')->name('painel.cadastrar');
    
    Route::post('/login', 'Auth\LoginController@autentica')->name('login.autentica');
    Route::get('/login', 'Auth\LoginController@login')->name('login.index');

    Route::resource('/painel', 'UsuarioController');
});

Route::group(['prefix' => 'dashboard'], function(){
    

    Route::get('/perfil', 'UsuarioController@edit')->name('perfil.editar');
    Route::post('/perfil', 'UsuarioController@update')->name('perfil.atualizar');
    
    Route::get('/index', 'DashboardController@index')->name('DashboardController.index');
    Route::get('/condominio', 'DashboardController@condominio')->name('condominio.index');
    Route::post('/condominio', 'DashboardController@cadastrarCondominio')->name('condominio.cadastro');
            
    Route::get('/logout', 'DashboardController@logout')->name('dashboard.logout');
});

/*

 * Route::get('/login', function () {
        return view('auth.login');
    });
 * 
 * 
Route::get('/painel/cadastrar', function () {
    return redirect()->route('painel.cadastrar');
});



Route::get('painel.login', function () {
        return view('auth.login');
    });

Route::resource('/painel', 'PainelController',['names' => [
    'cadastrar' => 'painel.cadastrar'
    
]]);
*/

//Route::get('/cadastrar', 'UsuarioController@create')->name('cadastrar');
//Route::get('/login', 'UsuarioController@logar')->name('login');
//Route::resource('/usuario', 'UsuarioController');

Route::get('/', function () {
    return view('index');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/painel', 'PainelController@index')->name('painel');
//Route::resource('/login', 'Auth\LoginController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
