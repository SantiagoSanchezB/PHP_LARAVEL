@extends('layout')
@section('title',$cat->id ? 'Editar Categoria' : 'Nueva Categoria')
@section('encabezado',$cat->id ? 'Editar Categoria': 'Agregar Categoria')
@section('content')

<form action="{{ route('catSave') }}" method="POST" style="width: 100%; padding-top: 2%;"> {{-- --}}
    @csrf
    <input type="hidden" class="form-control" name="id" value="{{  old('id') ? old('id'):$cat->id}}">
    <div class="form-group p-2" >
      <label>Nombre Categoria</label>
      <input type="text" name="Name" class="form-control" placeholder="Ingrese el nombre del marca" value="{{  old('Name') ? old('Name'):$cat->name}}" >
         @error('Name')
             <p class="text-danger">{{ $message }}</p>
         @enderror
    </div>
    <div class="form-group p-2" >
        <label>Descripcion</label>
        <textarea name="Description" class="form-control" placeholder="Ingrese descripcion" >{{  old('Name') ? old('Name'):$cat->description}}</textarea>
           @error('Name')
               <p class="text-danger">{{ $message }}</p>
           @enderror
      </div>


    <div class="form-group p-2">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('/categories')}}" class="btn btn-danger " >Cancelar</a>
    </div>
</form>
@endsection
