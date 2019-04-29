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
Route::get('/{any}', 'PagesController@index')->where('any', '.*');
/*
    7 actions à gérer en général :

    GET /recettes (index)
    GET /recettes/create (create)
    GET /recettes/1 (show)
    POST /recettes (store)
    GET /recettes/1/edit (edit)
    PATCH /recettes/1 (update)
    DELETE /recettes/1 (destroy)
*/
Route::get('/', 'PagesController@home');
Route::get('/cuisine', 'PagesController@cuisine');

Route::resource('recettes', 'RecettesController');
// La ligne ci-dessus équivaut à :

// Route::get('/recettes', 'RecettesController@index');
// Route::get('/recettes/create', 'RecettesController@create');
// Route::get('/recettes/{recette}', 'RecettesController@show');
// Route::post('/recettes', 'RecettesController@store');
// Route::get('/recettes/{recette}/edit', 'RecettesController@edit');
// Route::patch('/recettes/{recette}', 'RecettesController@update');
// Route::delete('recette/{recette}', 'RecettesController@destroy');

Route::post('recettes/{recette}/etapes', 'RecetteEtapesController@store');
Route::patch('/etapes/{etape}', 'RecetteEtapesController@update');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('phpinfo', function(){
	phpinfo();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
