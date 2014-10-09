<?php

Route::get('/', function()
{
	return View::make('home');
});

Route::controller('auth', 'AuthController');
Route::controller('mon-compte', 'MonCompteController');
Route::controller('agenda', 'AgendaController');
Route::controller('tchat', 'TchatController');
Route::controller('trombino', 'TrombinoscopeController');
Route::controller('petites-annonces', 'PetitesAnnoncesController');