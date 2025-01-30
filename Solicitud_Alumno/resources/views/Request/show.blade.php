@extends('layouts.app')

@section('content')

<a href="{{ route('student.index') }}" class="btn btn-secondary mb-3">Back</a>

@if(isset($relation))
    <div class="card">
        <div class="card-header">
            <h1>Solicitud de Prácticas</h1>
        </div>
        <div class="card-body">
            <p><strong>Estudiante:</strong> {{ $student->name }}</p>
            <p><strong>Empresa:</strong> {{ $company->name }}</p>
            <p><strong>Pregunta:</strong> {{ $relation->question }}</p>
        </div>
    </div>
@else
    <p>No hay datos disponibles para esta solicitud.</p>
@endif

@endsection