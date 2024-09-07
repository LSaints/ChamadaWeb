@extends('template')

@section('content')

<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center">Login</h2>
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
        <div class="register-link">
            <p>Não tem uma conta? <a href="/register" class="link-primary">Registre-se aqui</a></p>
        </div>
    </div>
</div>
</div>

@endsection
