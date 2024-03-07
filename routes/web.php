<?php

    use App\Http\Controllers\JogosController;
    use Illuminate\Support\Facades\Route;
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


/*
    Método fornecido pelo Laravel para simplificar o processo de definição de rotas relacionadas à autenticação em uma aplicação.
    Ao executar Auth::routes();, o Laravel cria as seguintes rotas: Login, Registro, Logout, Redefinição de senha
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('jogos')->group(function() {
    Route::get('/', [JogosController::class, 'index'])->name('jogos-index');
    Route::get('/create', [JogosController::class, 'create'])->name('jogos-create');
    Route::post('/', [JogosController::class, 'store'])->name('jogos-store');
    Route::get('/{id}/edit', [JogosController::class, 'edit'])->where('id', '[0-9]+')->name('jogos-edit');
    Route::put('/{id}', [JogosController::class, 'update'])->where('id', '[0-9]+')->name('jogos-update');
    Route::delete('/{id}', [JogosController::class, 'destroy'])->where('id', '[0-9]+')->name('jogos-destroy');
});

//Route::get('/jogos', [JogosController::class, 'index']);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');
