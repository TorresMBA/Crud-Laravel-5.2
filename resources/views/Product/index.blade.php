@extends('layout.master')

@section('title', 'Lista de Productos')

@section('content')
    <!-- Main component for a primary marketing message or call to action --><br>
    <div class="page-header">
        <h1>Productos <small>Actualizados hasta hoy</small></h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista
                    <p class="navbar-text navbar-right" style=" margin-top: 1px;">
                        <button type="button" id="nuevo" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
                    </p>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($productos as $products)
                                <tr>
                                    <td>{{ $products->id }}</td>
                                    <td>{{ $products->name }}</td>
                                    <td>{{ $products->price }}</td>
                                    <td>{{ $products->mark }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $products->id) }}" class="btn btn-info">Editar</a>
                                        <a href="{{ route('product.show', $products->id) }}" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#nuevo").click(function(e){
            document.location.href = "{{ route('product.create') }}";
        });
    </script>

@endsection