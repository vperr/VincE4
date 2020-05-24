<?php

use Illuminate\Http\Request;

//accepter les demandes provenant par autre serveurs Angular sans etre bloque par le navigateur
header( "Access-Control-Allow-Origin: *");
//methodes authorisées
header( "Access-Control-Allow-Methods: PUT, GET, POST, DELETE" );
header( "Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept" );


Route::post("Connexion", "ConnexionController@signIn");

Route::get("ListePraticien", "PraticiensController@listePraticien");

Route::post("SearchPratNom", "PraticiensController@recherchePratNom");

Route::get("ListeTypePraticien", "PraticiensController@listeTypePraticien");

Route::post("SearchTypePrat", "PraticiensController@recherchePratType");

