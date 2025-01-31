@extends('layouts.app')

@section('content')
<a href="{{ route('student.create') }}" class="btn btn-primary mb-3">Crea un nuevo estudiante</a>

<a href="{{ route('company.index') }}" class="btn btn-primary mb-3">Ver Empresas</a>

<a href="{{ route('request.create') }}" class="btn btn-primary mb-3">Crear Solicitud</a>

<ul class="list-group">
    @forelse($students as $student)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('student.show', $student->id) }}">{{ $student->name }}</a>
            <div>
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-warning">EDIT</a>
                <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline">
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