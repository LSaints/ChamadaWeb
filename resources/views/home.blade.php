@extends('template-main')

@section('content')


<div class="container">
    <div class="text-center mb-4">
        <h2 id="welcome-message">Olá, {{ $user->name }}</h2>
        <p id="role-info" class="lead">Você é um {{ $user->role }}</p>
    </div>

    <!-- Disciplinas e informações específicas -->
    <div id="professor-content" class="role-specific-content">
        <h3 class="mb-4">Suas Disciplinas</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-book"></i> Matemática</h5>
                        <p>Gerencie planos de aula e acompanhe o progresso dos alunos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-book"></i> Física</h5>
                        <p>Crie e revise materiais didáticos e avaliações.</p>
                    </div>
                </div>
            </div>
            <!-- Adicione mais disciplinas conforme necessário -->
        </div>
        <h3 class="mt-4">Outras Informações</h3>
        <p>Você pode gerenciar suas disciplinas, consultar planos de aula e acompanhar o progresso dos alunos.</p>
    </div>

    <div id="student-content" class="role-specific-content">
        <h3 class="mb-4">Suas Disciplinas</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-book"></i> Matemática</h5>
                        <p>Consulte notas e verifique atividades pendentes.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-book"></i> História</h5>
                        <p>Acompanhe o progresso e revise o material estudado.</p>
                    </div>
                </div>
            </div>
            <!-- Adicione mais disciplinas conforme necessário -->
        </div>
        <h3 class="mt-4">Outras Informações</h3>
        <p>Você pode consultar suas notas, verificar atividades e acompanhar o progresso das disciplinas.</p>
    </div>
</div>


@endsection
