@extends('layouts.base')
@section('title', '⭐⭐⭐')
@section('content')
    <h1 class="my-3">Campeones de mundo ⭐⭐⭐</h1>
    <div class="players-container col-6 p-4">
        <table class="table table-hover m-0 p-0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Botines</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $p)
                    <tr class="my-3">
                        <td class="p-2 my-2">
                            {{ $p->name }}
                        </td>
                        @if ($p->boots == null)
                            <td>-</td>
                        @else
                            <td>{{ $p->boots->model}}</td>
                        @endif
                        <td class="player-actions">
                            <form action="{{ route('players.destroy', $p->id) }}" method="Post">
                                <a class="btn btn-primary btn-sm" href="{{ route('players.edit',$p->id) }}">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection