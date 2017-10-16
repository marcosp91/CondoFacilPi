<?php

	// Dashboard
	Breadcrumbs::register('/home', function ($breadcrumbs) {
	    $breadcrumbs->push('Dashboard', route('dashboard.home'));
	});

	// Dashboard > Avisos
	Breadcrumbs::register('/avisos', function ($breadcrumbs) {
	    $breadcrumbs->parent('/home');
	    $breadcrumbs->push('Avisos', route('avisos.index'));
	});

	// Dashboard > Área Comum 
	Breadcrumbs::register('cadastro/novaArea', function ($breadcrumbs) {
	    $breadcrumbs->parent('/home');
	    $breadcrumbs->push('Áreas Comuns');
	});


	// Dashoard > [Áreas Comuns] > Cadastrar Área Comun
	Breadcrumbs::register('cadastro/areaComum', function ($breadcrumbs) {
	    $breadcrumbs->parent('cadastro/novaArea');
	    $breadcrumbs->push('Cadastrar Área Comum', route('areaComun.cadastro'));
	});

	// Dashoard > [Áreas Comuns] > Reservar Área Comun
	Breadcrumbs::register('cadastro/reservaArea', function ($breadcrumbs) {
	    $breadcrumbs->parent('cadastro/novaArea');
	    $breadcrumbs->push('Reservar Área Comum', route('reservaArea.cadastro'));
	});

	// Dashboard > Cadastro Condôminos
	Breadcrumbs::register('cadastro/condomino', function ($breadcrumbs) {
	    $breadcrumbs->parent('/home');
	    $breadcrumbs->push('Condôminos', route('condomino.index'));
	});

	// Dashboard > Cadastro Condomínios
	Breadcrumbs::register('cadastro/condominio', function ($breadcrumbs) {
	    $breadcrumbs->parent('/home');
	    $breadcrumbs->push('Cadastrar Condomínio', route('condominio.index'));
	});

	// Dashboard > Editar Perfil
	Breadcrumbs::register('/perfil', function ($breadcrumbs) {
	    $breadcrumbs->parent('/home');
	    $breadcrumbs->push('Editar Perfil', route('perfil.editar'));
	});




