@extends('layouts.app')
@section('content')
<h1>Atualizar Produto</h1>

<form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post">
    @csrf


    <div class="form-group">
        <label for="name">Nome Produto</label>
        <input type="text" name="name" class="form-control" value="{{$product->name}}">
    </div>
    <div class="form-group">
        <label for="name">Descrição</label>
        <input type="text" name="description" class="form-control" value="{{$product->description}}">
    </div>
    <div class="form-group">
        <label for="name">Conteúdo</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$product->body}}</textarea>
    </div>

    <div class="form-group">
        <label for="phone">Preço</label>
        <input type="text" name="price" class="form-control" value="{{$product->price}}">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
    </div>


    <div>
        <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
    </div>

</form>
@endsection

