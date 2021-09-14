@extends('layout')
@section('title', 'Invoices')
@section('encabezado', 'Invoice')

@section('content')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Subtotal</th>
                <th>Total</th>
                <th><a href="" class="btn btn-primary" style="float: right">Agregar Invoice</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $invoices as $invoice )
                <tr>
                    <td>{{ $invoice->id}}</td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>${{ number_format($invoice->subtotal,0,",",".") }}</td>
                    <td>${{ number_format($invoice->total,0,",",".") }}</td>
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal{{ $invoice->id }}">Detalle</button>
                        <a href="" class="btn btn-info">Editar</a>
                        <a href="" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>

                <div class="modal fade" id="modal{{ $invoice->id }}"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Invoice {{ $invoice->id }}</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-3">Producto</div>
                                <div class="col-sm-3">Cantidad</div>
                                <div class="col-sm-3">Precio</div>
                                <div class="col-sm-3">Total Producto</div>
                            </div>
                            @foreach ( $invoice->products as $product )
                                <div class="row">
                                    <div class="col-sm-3">{{$product->Name}}</div>
                                    <div class="col-sm-3">{{$product->pivot->quantity}}</div>
                                    <div class="col-sm-3">{{$product->pivot->price}}</div>
                                    <div class="col-sm-3">{{$product->pivot->quantity * $product->pivot->price}}</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
        </tbody>
    </table>


@endsection
