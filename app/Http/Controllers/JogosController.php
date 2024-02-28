<?php

namespace App\Http\Controllers; // Define o espaço de nomes ao qual a classe JogosController pertence.

use Illuminate\Http\Request; // Permite que você importe classes em seu arquivo. Neste caso, está importando a classe Request do Laravel, que é usada para manipular as solicitações HTTP.

class JogosController extends Controller
{

    public function index()
    {
        //dd('Olá mundo');

        // Passando parâmetros para rota jogos, fica mais seguro via Controller do que via router.
        $id = 1;
        $nome = 'Bruno Lima';
        return view('jogos.index', ['nome'=>$nome, 'id'=>$id]);
    }
}
