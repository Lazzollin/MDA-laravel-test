@extends('layouts.base')
@section('title', 'Crear')
@section('content')
    <form class="col-4 d-flex flex-column px-4 mt-4" action="{{ route('players.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Nombre: </label>
        <input type="text" name="name" class="form-control mb-2" placeholder="Nombre del jugador">
        @error('name')
            <div >{{ $message }}</div>
        @enderror

        <label for="boots_id">Botines: </label>
        <select name="boots_id" class="form-select">
            <option value="">No tiene</option>
            @foreach ($boots as $b)
                <option value="{{ $b->id }}">{{ $b->model }}</option>
            @endforeach
        </select>
        @error('boots_id')
            <div >{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Crear</button>
    </form>
@endsection