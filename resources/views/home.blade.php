@extends('template-main')

@section('content')


<div class="container">
    <div class="text-center mb-4">
        <h2 id="welcome-message">Olá, {{ $user->name }}</h2>
        <p id="role-info" class="lead">Você é um {{ $user->role }}</p>
    </div>
    @if ($user->role !== 'Aluno')
        <h3 class="mb-4">Área do Professor</h3>
        <p>Bem-vindo à sua área de gestão de disciplinas e acompanhamento de alunos.</p>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-book"></i> Gerenciar Disciplinas</h5>
                        <p class="card-text">Visualize e edite as disciplinas que você ensina.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-calendar-check"></i> Planos de Aula</h5>
                        <p class="card-text">Crie e gerencie seus planos de aula para cada disciplina.</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div id="professor-content" class="role-specific-content">
            <h3 class="mb-4">Suas Disciplinas</h3>
            <div class="row">
                @foreach($disciplines as $discipline)
                    <div class="col-md-6">
                        <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-book"></i> {{ $discipline->name }}</h5>
                                    <p>Gerencie planos de aula e acompanhe o progresso dos alunos.</p>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    @endif
</div>


@endsection
