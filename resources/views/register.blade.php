@extends('template')

@section('content')

<div class="full-height">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Registro</h2>
            <form action="/register" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
                <div class="mb-3">
                    <label for="job" class="form-label">Cargo</label>
                        <select id="job" name="job" class="form-select" required>
                            <option value="" disabled selected>Selecione um cargo</option>
                            <option value="professor">Professor</option>
                            <option value="aluno">Aluno</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>
            <div class="register-link text-center mt-3">
                <p>Já tem uma conta? <a href="auth/login" class="link-primary">Faça login aqui</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
