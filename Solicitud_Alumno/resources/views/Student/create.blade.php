@extends('layouts.app')

@section('content')

<a href="{{ route('student.index') }}">Back</a>

<form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
    @csrf 

    <div>
        <label for="dni">DNI</label>
        <input type="text" name="dni" maxlength="9" required>
        @error('dni')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>

    <br/>

    <div>
        <label for="name">Nombre</label>
        <input type="text" name="name" required>
        @error('name')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>

    <br/>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        @error('email')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>

    <br/>

    <div>
        <label for="CV">Subir CV</label>
        <input type="file" name="CV" >
        @error('CV')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>

    <br/>

    <div>
        <label for="group">Grupo</label>
        <select name="group" required>
            <option value="1-ASIR">1º ASIR</option>
            <option value="2-ASIR">2º ASIR</option>
            <option value="1-DAW">1º DAW</option>
            <option value="2-DAW">2º DAW</option>
            <option value="1-DAM">1º DAM</option>
            <option value="2-DAM">2º DAM</option>
        </select>
        @error('group')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>

    <br/>

    <div>
        <label for="course">Curso</label>
        <select name="course" required>
            <option value="24/25">2024/2025</option>
            <option value="25/26">2025/2026</option>
            <option value="26/27">2026/2027</option>
        </select>
        @error('course')
            <small style="color: red">{{ $message }}</small>
        @enderror
    </div>      

    <br/>

    <input type="submit" value="Create"/>
</form>

@endsection
