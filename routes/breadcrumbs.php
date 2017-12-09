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

	// Dashoard > [Áreas Comuns] > Cadastrar
	Breadcrumbs::register('cadastro/areaComum', function ($breadcrumbs) {
	    $breadcrumbs->parent('cadastro/novaArea');
	    $breadcrumbs->push('Cadastrar', route('area.index'));
	});

	// Dashoard > [Áreas Comuns] > Reservar
	Breadcrumbs::register('cadastro/reservaArea', function ($breadcrumbs) {
	    $breadcrumbs->parent('cadastro/novaArea');
	    $breadcrumbs->push('Reservar', route('reservaArea.cadastro'));
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

	// Dashboard > Chamados
	Breadcrumbs::register('/chamados', function ($breadcrumbs) {
	    $breadcrumbs->parent('/home');
	    $breadcrumbs->push('Chamados', route('chamados.index'));
	});





