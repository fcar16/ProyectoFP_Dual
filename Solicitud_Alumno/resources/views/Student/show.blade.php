@extends('layouts.app')

@section('content')

<a href="{{ route('student.index') }}" class="btn btn-secondary mb-3">Back</a>

@if(isset($student))
    <div class="card">
        <div class="card-header">
            <h1>DNI: {{ $student->dni }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Grupo:</strong> {{ $student->group }}</p>
            <p><strong>Curso:</strong> {{ $student->course }}</p>

            @if($student->CV)
                <p><strong>CV:</strong> <a href="{{ asset('storage/' . $student->CV) }}" target="_blank">Ver CV</a></p>
            @endif
        </div>
    </div>
@else
    <p>No student data available.</p>
@endif

@endsection