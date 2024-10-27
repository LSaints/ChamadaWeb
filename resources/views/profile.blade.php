@extends('template-main')

@section('content')
<div class="container mt-5">
    <div class="profile-header mb-4 text-center">
        <h2 id="user-name" class="display-4">{{ $user->name }}</h2>
        <p id="user-role" class="lead">Cargo: {{ $user->role }}</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4 shadow">
                <div class="card-body">
                    <h5 class="card-title">Informações Pessoais</h5>
                    <p><strong>Nome:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>CPF:</strong> {{ $user->cpf }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4 shadow">
                <div class="card-body">
                    <h5 class="card-title">Informações de Conta</h5>
                    <p><strong>Cargo:</strong> {{ $user->role }}</p>
                    @if ($user->role === 'Aluno')
                        <p><strong>Matrícula:</strong> {{ $user->registration }}</p>
                        <h5 class="mt-3">Disciplinas</h5>
                        @if($allDisciplines->isEmpty())
                            <p class="text-muted">Você ainda não possui disciplinas cadastradas.</p>
                        @else
                            <ul class="list-group">
                                @foreach($allDisciplines as $discipline)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>{{ $discipline->name }}</strong>
                                        <span>Capacidade: {{ $discipline->capacity }} - Aberta: {{ $discipline->isOpen ? 'Sim' : 'Não' }}</span>
                                        <form action="{{ route('discipline.AddDisciplineToStudent', ['disciplineId' => $discipline->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary btn-sm" @if(in_array($discipline->id, $student_disciplines)) disabled @endif>
                                                @if(in_array($discipline->id, $student_disciplines))
                                                    Já foi adicionada
                                                @else
                                                    Adicionar
                                                @endif
                                            </button>

                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($user->role === 'Professor')
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar Disciplina</h5>
                        <form action="{{ route('discipline.create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome da Disciplina</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="capacity" class="form-label">Capacidade</label>
                                <input type="number" class="form-control" id="capacity" name="capacity" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Adicionar Disciplina</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Minhas Disciplinas</h5>
                        @if($disciplines->isEmpty())
                            <p class="text-muted">Você ainda não possui disciplinas cadastradas.</p>
                        @else
                            <ul class="list-group">
                                @foreach($disciplines as $discipline)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>{{ $discipline->name }}</strong>
                                        <span>Capacidade: {{ $discipline->capacity }} - Aberta: {{ $discipline->isOpen ? 'Sim' : 'Não' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    function addDisciplineToStudent(discipline) {
        axios.post(`/disciplines/${discipline.id}/add`)
            .then(response => {
                alert('Disciplina adicionada com sucesso!');
                location.reload();
            })
            .catch(error => {
                if (error.response) {
                    alert(error.response.data.error);
                } else {
                    alert('Ocorreu um erro ao adicionar a disciplina. Tente novamente.');
                }
            });
    }
</script>
@endsection
