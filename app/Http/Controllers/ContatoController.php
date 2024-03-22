<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function submit(Request $request) {

        // Validar os dados recebidos do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pass' => 'required|string|min:8',
            'estado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'mensagem' => 'required|string|max:1000',
        ]);

        return redirect()->back()->with('success', 'Formulário enviado com sucesso!');
    }

    public function index()
    {
        return view('contato');
    }
}
