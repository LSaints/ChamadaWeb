@extends('template-main')

@section('content')

<div class="container">
    <h2>Alunos Matriculados na Disciplina: {{ $discipline->name }}</h2>

    @if($students->isEmpty())
        <p>Não há alunos matriculados nesta disciplina.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Matrícula</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->registration }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
