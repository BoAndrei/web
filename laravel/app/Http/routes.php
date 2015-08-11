<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('PrimaPagina');
    

});

Route::get('register','SessionController@register');

Route::post('register_process','SessionController@StoreRegister');

Route::get('login','SessionController@login');

Route::post('login_process','SessionController@StoreLogin');

Route::get('logout','SessionController@destroy');

Route::get('profil/{username}','UserController@profile');

Route::post('EditEmail','UserController@EditEmail');

Route::post('EditParola','UserController@EditParola');

Route::post('TrimiteMesaj','MesajeController@TrimiteMesaj');

Route::get('profil/{username}/setarilecontului','ProfilController@setarilecontului');

Route::get('profil/{username}/mesaje','ProfilController@mesaje');

Route::get('profil/{username}/mesaje/citeste-mesaj/{mesaj_id}','ProfilController@mesaj');

Route::get('profil/{username}/mesaje/mesaje-trimise','ProfilController@mesajetrimise');

Route::get('profil/{username}/mesaje/sterge-mesajd/{mesaj_id}','ProfilController@stergemesajd');

Route::get('profil/{username}/mesaje/sterge-mesaje/{mesaj_id}','ProfilController@stergemesaje');

Route::get('profil/{username}/modificareimagine','ProfilController@modificareimagine');

Route::post('/EditImagine','ProfilController@EditImagine');

Route::get('recuperareparola','UserController@RecuperareParola');


Route::get('admin',function(){
	return 'Admin page';
});