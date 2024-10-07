@extends('template-main')

@section('content')
<body>

    <div class="container">
        <div class="profile-header mb-4">
            <h2 id="user-name">{{ $user->name }}</h2>
            <p id="user-role">Cargo: {{ $user->role }}</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informações Pessoais</h5>
                        <p><strong>Nome:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>CPF:</strong> {{ $user->cpf }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informações de Conta</h5>
                        <p><strong>Cargo:</strong> {{ $user->role }}</p>
                        @if ($user->role === 'Aluno')
                            <p><strong>Matricula:</strong> {{ $user->registration }}</p>
                        @endif

                    </div>
                </div>
            </div>
            @if ($user->role === 'Professor')
            <div class="col-md-6">
                <h5>Adicionar Disciplina</h5>
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

            <div class="col-md-6">
                <h5>Minhas Disciplinas</h5>
                    @if($disciplines->isEmpty())
                        <p>Você ainda não possui disciplinas cadastradas.</p>
                    @else
                    <ul class="list-group">
                        @foreach($disciplines as $discipline)
                            <li class="list-group-item">
                                <strong>{{ $discipline->name }}</strong> - Capacidade: {{ $discipline->capacity }} - Aberta: {{ $discipline->isOpen ? 'Sim' : 'Não' }}
                            </li>
                        @endforeach
                    </ul>
                @endif
             </div>
            @endif
        </div>
    </div>
</body>


@endsection
