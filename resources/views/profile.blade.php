@extends('template')

@section('content')
<body>
    <header class="header mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Sistema de Gestão</h1>
            <nav>
                <a href="/home" class="me-3">Início</a>
                <a href="/">Sair</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="profile-header mb-4">
            <h2 id="user-name">Nome do Usuário</h2>
            <p id="user-role">Cargo: [Cargo]</p>
        </div>

        <!-- Informações do Perfil -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informações Pessoais</h5>
                        <p><strong>Nome:</strong> Nome do Usuário</p>
                        <p><strong>Email:</strong> email@exemplo.com</p>
                        <p><strong>CPF:</strong> 123.456.789-00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informações de Conta</h5>
                        <p><strong>Cargo:</strong> Professor/Aluno</p>
                        <!-- Adicione mais informações de conta, se necessário -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


@endsection
