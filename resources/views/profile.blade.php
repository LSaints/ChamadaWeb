@extends('template-main')

@section('content')
<body>

    <div class="container">
        <div class="profile-header mb-4">
            <h2 id="user-name">{{ $user->name }}</h2>
            <p id="user-role">Cargo: {{ $user->role }}</p>
        </div>

        <!-- Informações do Perfil -->
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
                        <!-- Adicione mais informações de conta, se necessário -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


@endsection
