@extends('layouts.app')

@section('content')

    <div class="row mb-2">
        <div class="col-md-3 col">
            <a href="{{route('admin.products.create')}}" class="btn btn-success btn-lg">Criar produto</a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col">
            <table class="table table-striped">
                <thead class="text-white bg-danger">

                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Loja</th>
                        <th class="text-center">Ações</th>
                    </tr>
                <tbody>
                    @foreach($products as $product)
                        <tr>

                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>R$ {{number_format($product->price, 2, ',', '.')}} </td>
                            <td>{{$product->store->name}}</td>
                            <td width="15%">
                                <div class="btn-group">

                                        <div class="row">
                                            <div class="col-md-4 col">
                                                <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-primary btn-sm">Editar</a>
                                            </div>

                                            <div class="col-md-4 col">
                                                <form  action="{{route('admin.products.destroy', ['product' => $product->id])}}">
                                                    @csrf

                                                    <button class="btn btn-danger btn-sm">Remover</button>
                                                </form>
                                            </div>


                                        </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

@endsection
