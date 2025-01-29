@extends('layouts.app')

@section('content')

<a href="{{ route('student.index') }}" class="btn btn-secondary mb-3">Back</a>

<h1>Crear Estudiante</h1>

<form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
    @csrf 

    <div class="form-group">
        <label for="dni">DNI</label>
        <input type="text" name="dni" class="form-control" maxlength="9" required>
        @error('dni')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="CV">Subir CV</label>
        <input type="file" name="CV" class="form-control-file">
        @error('CV')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="group">Grupo</label>
        <select name="group" class="form-control" required>
            <option value="1-ASIR">1º ASIR</option>
            <option value="2-ASIR">2º ASIR</option>
            <option value="1-DAW">1º DAW</option>
            <option value="2-DAW">2º DAW</option>
            <option value="1-DAM">1º DAM</option>
            <option value="2-DAM">2º DAM</option>
        </select>
        @error('group')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="course">Curso</label>
        <select name="course" class="form-control" required>
            <option value="24/25">2024/2025</option>
            <option value="25/26">2025/2026</option>
            <option value="26/27">2026/2027</option>
        </select>
        @error('course')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>      

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection