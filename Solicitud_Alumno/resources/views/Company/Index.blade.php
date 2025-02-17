@extends('layouts.app')

@section('content')

    @if(Auth::check() && Auth::user() instanceof \App\Models\Teacher)
        <a href="{{ route('company.create') }}" class="btn btn-primary mb-3">Crear Empresa</a>
    @endif

    <a href="{{ route('student.index') }}" class="btn btn-primary mb-3">Ver Estudiantes</a>

    <a href="{{ route('request.create') }}" class="btn btn-primary mb-3">Crear Solicitud</a>
    <ul class="list-group">
        @forelse ($companies as $company)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('company.show', $company->id) }}">{{ $company->name }}</a>
                <div>
                    <a href="{{ route('company.edit', $company->id) }}" class="btn btn-sm btn-warning">EDIT</a>
                    <form action="{{ route('company.destroy', $company->id) }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                    </form>
                </div>
            </li>
        @empty
            <li class="list-group-item">No data.</li>
        @endforelse
    </ul>
@endsection