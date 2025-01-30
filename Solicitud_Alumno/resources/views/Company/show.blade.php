@extends('layouts.app')

@section('content')

<a href="{{ route('company.index') }}" class="btn btn-secondary mb-3">Back</a>

@if(isset($company))
    <div class="card">
        <div class="card-header">
            <h1>NIF: {{ $company->NIF }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $company->name }}</p>
            <p><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h2>Estudiantes</h2>
        </div>
        <div class="card-body">
            @if($company->students->isEmpty())
                <p>No hay estudiantes asociados a esta compañía.</p>
            @else
                <ul>
                    @foreach($company->students as $student)
                        <li>{{ $student->name }} - {{ $student->pivot->question }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@else
    <p>No company data available.</p>
@endif

@endsection