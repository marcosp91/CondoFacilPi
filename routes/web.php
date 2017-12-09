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

    Route::get('avisos', 'AvisoController@index')->name('avisos.index');
    Route::get('avisos/{id}', 'AvisoController@destroy')->name('avisos.destroy');
    Route::get('avisos/{id}/editar', 'AvisoController@indexEditar')->name('avisos.editar');
    Route::put('avisos/{id}/editar', 'AvisoController@update')->name('avisos.update');
    Route::post('avisos', 'DashboardController@cadastrarPublicacao')->name('avisos.cadastro');
   
    
    Route::get('condominio', 'CondominioController@index')->name('condominio.index');
    Route::put('condominio', 'CondominioController@atualizaCondominio')->name('condominio.atualizar');
    Route::post('condominio', 'CondominioController@cadastrarCondominio')->name('condominio.cadastro');

    Route::get('condomino', 'UsuarioController@index')->name('condomino.index');
    Route::get('condomino/{id}', 'UsuarioController@destroy')->name('condomino.destroy');
    Route::get('condomino/{id}/editar', 'UsuarioController@indexEditar')->name('condomino.editar');
    Route::put('condomino/{id}/editar', 'UsuarioController@update')->name('condomino.update');
    Route::post('condomino', 'UsuarioController@store')->name('condomino.cadastro');

    Route::get('areaComum', 'AreaController@index')->name('area.index');
    Route::get('areaComum/{id}', 'AreaController@destroy')->name('areas.destroy');
    Route::get('areaComum/{id}/editar', 'AreaController@indexEditar')->name('areas.editar');
    Route::put('areaComum/{id}/editar', 'AreaController@update')->name('areas.update');
    Route::post('areaComum', 'AreaController@store')->name('area.cadastro');

    Route::get('reservaArea', 'ReservaController@index')->name('reservaArea.index');
    Route::get('reservaArea/{id}/editar', 'ReservaController@indexEditar')->name('reservaArea.editar');
    Route::put('reservaArea/{id}/editar', 'ReservaController@update')->name('reservaArea.update');
    Route::post('reservaArea', 'ReservaController@store')->name('reservaArea.cadastro');

    Route::get('chamados', 'ChamadosController@index')->name('chamados.index');
    Route::get('chamados/{id}', 'ChamadosController@destroy')->name('chamados.destroy');
    Route::get('chamado/{id}/editar', 'ChamadosController@indexEditar')->name('chamados.editar');
    Route::put('chamado/{id}/editar', 'ChamadosController@update')->name('chamados.update');
    Route::post('chamados', 'ChamadosController@cadastrarChamado')->name('chamados.cadastro');

    Route::get('perfil/{id}/editar', 'UsuarioController@indexEditar')->name('perfil.editar');
    Route::put('perfil/{id}/editar', 'UsuarioController@update')->name('perfil.update');
    
            
    Route::get('/logout', 'DashboardController@logout')->name('dashboard.logout');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/landing', function () {
    return view('landingPage');
});

 Route::post('/landing', 'ContatosController@insereContato')->name('index.landing');


Auth::routes();



