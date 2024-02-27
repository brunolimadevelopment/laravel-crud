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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::view('/bruno', 'jogos');
// Route::get('/jogos', function () {
//     return "Curso de Laravel";
// });
//Route::view('/jogos', 'jogos', ['name'=>'Bruno']); - variavel

// parametro dinamico - opcional apenas texto
// Route::get('/jogos/{name?}', function($name = null) {
//     return view('jogos', ['nomeJogo'=>$name]);
// })->where('name', '[A-Za-z]+');

// parametro dinamico - opcional apenas numero
// Route::get('/jogos/{id?}', function($id = null) {
//     return view('jogos', ['idJogo'=>$id]);
// })->where('id', '[0-9]+');

// parametro dinamico - juntando os dois exemplos anteriores
// Route::get('/jogos/{id?}/{name?}', function($id = null, $name = null) {
//     return view('jogos', ['id'=>$id, 'nome'=>$name]);
// })->where(['id', '[0-9]+','name'=>'[a-z]+']);

Route::get('/jogos', function () {
    return view('jogos');
});

// redirecionando para outra rota - href="#"
Route::get('/casa', function () {
    return view('welcome');
})->name('home-index');

// Erro de rotas - exibe uma mensagem de erro na tela.
Route::fallback(function () {
    return 'Erro ao localizar a rota!';
});
