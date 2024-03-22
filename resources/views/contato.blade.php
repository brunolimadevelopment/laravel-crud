@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulário</div>

                    <div class="card-body">
                        <form id="formulario" method="POST" action="{{ route('contato.submit') }}">
                            @csrf

                            <div class="step">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>

                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone">
                                </div>

                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf">
                                </div>

                                <button type="button" class="btn btn-primary next">Próximo</button>
                            </div>

                            <div class="step" style="display: none;">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="senha">Senha:</label>
                                    <input type="password" class="form-control" id="senha" name="senha">
                                </div>

                                <button type="button" class="btn btn-secondary prev">Anterior</button>
                                <button type="button" class="btn btn-primary next">Próximo</button>
                            </div>

                            <div class="step" style="display: none;">
                                <div class="form-group">
                                    <label for="estado">Estado:</label>
                                    <select class="form-control" id="estado" name="estado">
                                        <option value="">Selecione o estado</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="PR">Paraná</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cidade">Cidade:</label>
                                    <select class="form-control" id="cidade" name="cidade">
                                        <option value="">Selecione a cidade</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="BH">Belo Horizonte</option>
                                        <option value="POA">Porto Alegre</option>
                                        <option value="CU">Curitiba</option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-secondary prev">Anterior</button>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('formulario');
            const steps = form.querySelectorAll('.step');
            let currentStep = 0;

            // Função para mostrar o passo atual
            const showStep = stepIndex => {
                steps.forEach((step, index) => {
                    if (index === stepIndex) {
                        step.style.display = 'block';
                    } else {
                        step.style.display = 'none';
                    }
                });
            };

            // Função para avançar para o próximo passo
            const nextStep = () => {
                if (validateForm()) {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                }
            };

            // Função para voltar para o passo anterior
            const prevStep = () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            };

            // Adicionar event listeners para os botões de próximo e anterior
            form.querySelectorAll('.next').forEach(button => {
                button.addEventListener('click', () => {
                    nextStep();
                });
            });

            form.querySelectorAll('.prev').forEach(button => {
                button.addEventListener('click', () => {
                    prevStep();
                });
            });

            // Mostrar apenas o primeiro passo inicialmente
            showStep(currentStep);

            // Função para validar o formulário
            function validateForm() {
                const currentFields = steps[currentStep].querySelectorAll('input, select');
                let isValid = true;

                currentFields.forEach(field => {
                    if (field.value.trim() === '') {
                        field.classList.add('invalid');
                        isValid = false;
                    } else {
                        field.classList.remove('invalid');
                    }
                });

                return isValid;
            }

            // Adicionando um ouvinte de evento para o envio do formulário
            form.addEventListener('submit', function(event) {
                if (!validateForm()) {
                    event.preventDefault(); // Impede o envio do formulário se a validação falhar
                }
            });
        });
    </script>
@endsection
