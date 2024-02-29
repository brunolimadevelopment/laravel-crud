<?php

namespace App\Http\Controllers; // Define o espaço de nomes ao qual a classe JogosController pertence.

use App\Jogo;
use Illuminate\Http\Request; // Permite que você importe classes em seu arquivo. Neste caso, está importando a classe Request do Laravel, que é usada para manipular as solicitações HTTP.

class JogosController extends Controller
{

    public function index()
    {
        //dd('Olá mundo');
        $jogos = Jogo::all(); // pega todos os campos da tabela jogo
        //dd($jogos); // saneamento das variaveis, para ver se está retornando igual o var_dump()
        return view('jogos.index', ['jogos'=>$jogos]);
    }
}
