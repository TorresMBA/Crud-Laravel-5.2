@extends('layout.master')

@section('title', 'Editar Producto')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Escritorio</a></li>
    <li><a href="{{url('product')}}"> Productos</a></li>
    <li class="active">Editar Producto</li>
</ol>
<div class="page-header">
    <h1>Editar Producto</h1>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                        Editar Producto
            </div>
            <div class="panel-body">
                {!!Form::model($products, ['route'=>['product.update', $products->id], 'method'=>'PUT'])!!}
                    <div class="form-group">
                        {!!form::label('Nombre')!!}
                        {!!form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Digite Producto'])!!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Precio</label>
                        {!!form::label('Precio')!!}
                        {!!form::text('price',null,['id'=>'price','class'=>'form-control','placeholder'=>'Digite el Precio'])!!}
                    </div>
                    <div class="form-group">
                        {!!form::label('Marca')!!}
                        {!! Form::select('marks_id',$marks,null,['id'=>'marks_id','class'=>'form-control']) !!}
                    </div>
                        {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Editar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}             
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection