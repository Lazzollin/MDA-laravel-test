@extends('layouts.base')
@section('title', 'Editar')
@section('content')
    <form class="col-4 d-flex flex-column px-4 mt-4" action="{{ route('players.update',$player->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Nombre: </label>
        <input type="text" value="{{ $player->name }}" name="name" class="form-control mb-2" placeholder="Nombre del jugador">
        @error('name')
            <div >{{ $message }}</div>
        @enderror

        <label for="boots_id">Botines: </label>
        <select name="boots_id" class="form-select">
            @if ($player->boots == null)
                <option selected value="">No tiene</option>
            @else
                <option value="">No tiene</option>
            @endif
            @foreach ($boots as $b)
                @if ($player->boots != null && $b->id == $player->boots->id)
                    <option selected value="{{ $b->id }}">{{ $b->model }}</option>
                @else
                    <option value="{{ $b->id }}">{{ $b->model }}</option>
                @endif
            @endforeach
        </select>
        @error('boots_id')
            <div >{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Editar</button>
    </form>
@endsection