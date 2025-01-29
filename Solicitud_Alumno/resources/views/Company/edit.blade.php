@extends('layouts.app')

@section('content')

<a href="{{ route('company.index') }}" class="btn btn-secondary mb-3">Back</a>

<h1>Editar Empresa</h1>

<form method="POST" action="{{ route('company.update', $company->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="NIF">NIF</label>
        <input type="text" name="NIF" class="form-control" value="{{ $company->NIF }}" />
        @error('NIF')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ $company->name }}" />
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="Pagina Web">Pagina Web</label>
        <input type="text" name="website" class="form-control" value="{{ $company->website }}" />
        @error('website')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection