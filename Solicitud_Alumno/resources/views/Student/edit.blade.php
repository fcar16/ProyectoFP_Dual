@extends('layouts.app')

@section('content')
<a href="{{ route('student.index') }}" class="btn btn-secondary mb-3">Back</a>

<h1>Editar Estudiante</h1>

<form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="dni">DNI</label>
        <input type="text" name="dni" class="form-control" value="{{ $student->dni }}" />
        @error('dni')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ $student->name }}" />
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Mail</label>
        <input type="text" name="email" class="form-control" value="{{ $student->email }}" />
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="CV">Subir CV</label>
        <input type="file" name="CV" class="form-control-file" value="{{ $student->cv }}" />
        @error('cv')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="group">Grupo</label>
        <select name="group" class="form-control" required>
            <option value="1-ASIR" {{ $student->group == '1-ASIR' ? 'selected' : '' }}>1º ASIR</option>
            <option value="2-ASIR" {{ $student->group == '2-ASIR' ? 'selected' : '' }}>2º ASIR</option>
            <option value="1-DAW" {{ $student->group == '1-DAW' ? 'selected' : '' }}>1º DAW</option>
            <option value="2-DAW" {{ $student->group == '2-DAW' ? 'selected' : '' }}>2º DAW</option>
            <option value="1-DAM" {{ $student->group == '1-DAM' ? 'selected' : '' }}>1º DAM</option>
            <option value="2-DAM" {{ $student->group == '2-DAM' ? 'selected' : '' }}>2º DAM</option>
        </select>
        @error('group')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="course">Curso</label>
        <select name="course" class="form-control" required>
            <option value="24/25" {{ $student->course == '24/25' ? 'selected' : '' }}>2024/2025</option>
            <option value="25/26" {{ $student->course == '25/26' ? 'selected' : '' }}>2025/2026</option>
            <option value="26/27" {{ $student->course == '26/27' ? 'selected' : '' }}>2026/2027</option>
        </select>
        @error('course')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection