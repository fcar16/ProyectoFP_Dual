@extends('layouts.app')

@section('content')

<a href="{{ route('student.index') }}" class="btn btn-secondary mb-3">Back</a>

<h1>Solicitar Prácticas en Empresa</h1>

<form method="POST" action="{{ route('request.store') }}">
    @csrf
    <div class="form-group">
        <label for="student_id">Estudiante</label>
        <select name="student_id" class="form-control" required>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="company_id">Empresa</label>
        <select name="company_id" class="form-control" required>
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="question">Pregunta</label>
        <input type="text" name="question" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
</form>

@endsection