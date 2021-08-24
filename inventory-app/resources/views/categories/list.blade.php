@extends('layout')
@section('title', 'Categorias')
@section('encabezado', 'Lista de Categorias')
@section('content')

@if (session()->has('agregate'))
    <div class="alert alert-success">
        {{ session()->get('agregate') }}
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-danger">
        {{ session()->get('delete') }}
    </div>
@endif

    <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th><a href="{{ route('catRegister')}}" class="btn btn-primary" style="float: right">Agregar Categoria</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categList as $cat)
        <tr>
            <td>{{ $cat->name}}</td>
            <td>{{ $cat->description}}</td>
            <td>
                <a href="{{ route('catRegister',['id' => $cat->id]) }}" class="btn btn-info">Editar</a>
                {{-- <a href="/brand/delete/{{ $brand->id }}" class="btn btn-danger">Eliminar</a> --}}
                <a href="{{ route('catDelete',['id' => $cat->id]) }}" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
