@extends('layouts.app')

@section('title', 'Criação')

@section('content')
    <!-- Tudo aqui dentro vai ser renderizado lá no template app.blade.php -->
    <section class="d-flex align-items-center" style="height: 100vh">
        <div class="container">
            <h1>Crie um novo jogo</h1>
            <hr>
            <form action="{{ route('jogos-store') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" placeholder="Digite um nome...">
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <input type="text" class="form-control" name="categoria"
                            placeholder="Digite uma categoria para o jogo...">
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="ano_criacao">Ano de criação:</label>
                        <input type="number" class="form-control" name="ano_criacao" placeholder="Ano de criação...">
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="number" class="form-control" name="valor"
                            placeholder="Digite um valor para o jogo...">
                    </div>
                    <br />
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Enviar">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endSection
