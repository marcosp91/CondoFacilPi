<?php


Route::group(['prefix' => 'painel'], function(){
    Route::get('/cadastrar', 'UsuarioController@create')->name('painel.cadastrar');
    
    Route::post('/login', 'Auth\LoginController@autentica')->name('login.autentica');
    Route::get('/login', 'Auth\LoginController@login')->name('login.index');

    Route::resource('/painel', 'UsuarioController');
});

Route::group(['prefix' => 'dashboard'], function(){

    Route::get('/home', 'DashboardController@home')->name('dashboard.home');
    Route::post('/home', 'DashboardController@home')->name('dashboard.home');

    Route::get('/avisos', 'AvisoController@index')->name('avisos.index');
    Route::post('/avisos', 'DashboardController@cadastrarPublicacao')->name('avisos.cadastro');
   
    
    Route::get('cadastro/condominio', 'DashboardController@condominio')->name('condominio.index');
    Route::post('cadastro/condominio', 'DashboardController@cadastrarCondominio')->name('condominio.cadastro');
    
    Route::get('cadastro/condomino', 'UsuarioController@index')->name('condomino.index');
    Route::post('cadastro/condomino', 'DashboardController@cadastrarCondomino')->name('condomino.cadastro');

    Route::get('cadastro/areaComum', 'AreaController@areaComum')->name('areaComun.cadastro');
    Route::post('cadastro/areaComum', 'AreaController@areaComum')->name('areaComun.cadastro');

    Route::get('cadastro/reservaArea', 'AreaController@reservarAreaComum')->name('reservaArea.cadastro');
    Route::post('cadastro/reservaArea', 'AreaController@reservarAreaComum')->name('reservaArea.cadastro');


    Route::get('/perfil', 'UsuarioController@edit')->name('perfil.editar');
    Route::post('/perfil', 'UsuarioController@update')->name('perfil.atualizar');
    
            
    Route::get('/logout', 'DashboardController@logout')->name('dashboard.logout');
});

Route::get('/', function () {
    return view('index');
});

Auth::routes();



