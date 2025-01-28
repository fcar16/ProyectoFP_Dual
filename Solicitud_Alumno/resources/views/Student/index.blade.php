@extends('layouts.app')

@section('content')
<a href="{{ route('student.create') }}">Crea un nuevo estudiante</a>
<ul>
    @forelse($students as $student)
        <li><a href="{{ route('student.show', $student->id) }}">{{ $student->name}}</a> |
            <a href="{{ route('student.edit', $student->id) }}">EDIT</a> |
            <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                @method('delete')
                @csrf
                <input type="submit" value="DELETE" />
            </form>
        </li>
    @empty
        <p>No data.</p>
    @endforelse
</ul>