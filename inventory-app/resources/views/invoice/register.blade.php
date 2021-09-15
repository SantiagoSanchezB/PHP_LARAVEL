@extends('layout')
@section('title', 'Nueva Factura')
@section('encabezado','Nueva Factura')
@section('content')

    <form action="{{ route('invSave') }}" method="POST" style="width: 100%; padding-top: 2%;">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <select name="Product[]" id="product" class="form-select">
                    @foreach ($products as $product)
                        <option value="{{$product->id}}">{{ $product->Name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <input type="number" name="Quantity[]" class="form-control">
            </div>
        </div>
    </form>
@endsection

@section('scripts')

@endsection
