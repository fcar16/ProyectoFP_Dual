@extends('layouts.app')


@section('content')
<a href="{{ route('student.index') }}">Back</a>
<form action="{{ route('student.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="">DNIU</label>
    <input type="text" name="dni" value="{{ $student->dni }}"/>
    @error('dni')
    <small style="color: red">{{ $message }}</small>
    @enderror
    <label for="">Nombre</label>
    <input type="text" name="name" value="{{ $student->name }}"/>
    @error('name')
    <small style="color: red">{{ $message }}</small>
    @enderror
    <label for="">Mail</label>
    <input type="text" name="eamil" value="{{ $student->email }}"/>
    @error('email')
    <small style="color: red">{{ $message }}</small>
    @enderror
    <label for="CV">Subir CV</label>
    <input type="file" name="cv" value="{{ $student->cv }}"/>
    @error('cv')
    <small style="color: red">{{ $message }}</small>
    @enderror
    <label for="">Grupo</label>
    <select name="group" required value="{{ $student->group }}">
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
    <label for="">Curso</label>
    <select name="course" required value="{{ $student->course }}">
        <option value="24/25">2024/2025</option>
        <option value="25/26">2025/2026</option>
        <option value="26/27">2026/2027</option>
    </select>
    @error('course')
    <small style="color: red">{{ $message }}</small>
    @enderror
    <input type="submit" value="Update"/>
</form>
@endsection