@extends('layouts.app')

@section('content')

<a href="{{ route('student.index') }}" class="btn btn-secondary mb-3">Back</a>

<h1>Solicitudes de {{ $student->name }}</h1>

@if($requests->isEmpty())
    <p>No hay solicitudes realizadas por este estudiante.</p>
@else
    <ul class="list-group">
        @foreach($requests as $request)
            <li class="list-group-item">
                <p><strong>Empresa:</strong> {{ \App\Models\Company::find($request->company_id)->name }}</p>
                <p><strong>Pregunta:</strong> {{ $request->question }}</p>
                <a href="{{ route('request.show', $request->id) }}" class="btn btn-primary">Ver Detalles</a>
            </li>
        @endforeach
    </ul>
@endif

@endsection