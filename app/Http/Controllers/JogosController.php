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

    public function create() {
        return view('jogos.create');
    }

    public function store(Request $request) {
        //dd($request);
        Jogo::create($request->all()); // salva o request do tipo post
        return redirect()->route('jogos-index');
    }
    public function edit($id) {
        $jogos = Jogo::where('id', $id)->first();
        if(!empty($jogos))
        {
            return view('jogos.edit', ['jogos'=>$jogos]);
        } else {
            return redirect()->route('jogos-index');
        }
    }
    public function update(Request $request, $id) {
        //dd($request);
        $data = [
            'nome' => $request->nome,
            'categoria' => $request->categoria,
            'ano_criacao' => $request->ano_criacao,
            'valor' => $request->valor,
        ];
        // model Jogo - enviando os dados do form para o banco.
        Jogo::where('id',$id)->update($data);
        return redirect()->route('jogos-index');
    }

    public function destroy($id) {
        //dd($id);
        Jogo::where('id',$id)->delete();
        return redirect()->route('jogos-index');
    }
}
