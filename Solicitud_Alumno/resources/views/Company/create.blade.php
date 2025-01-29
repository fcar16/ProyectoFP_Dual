@extends('layouts.app')

@section('content')
<a href="{{ route('company.index') }}" class="btn btn-secondary mb-3">Back</a>
<h1>Crear Empresa</h1>
<form method="POST" action="{{ route('company.store') }}">
    @csrf
    <div class="form-group">
        <label>NIF</label>
        <input type="text" name="NIF" class="form-control" />
        @error('NIF')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" />
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Pagina Web</label>
        <input type="text" name="website" class="form-control" />
        @error('website')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection