@extends('layouts.app')
@section('content')

<h1>Criar Produto</h1>

<form action="{{route('admin.products.store')}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group">
        <label for="name">Nome Produto</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Descrição</label>
        <input type="text" name="description" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Conteúdo</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="phone">Preço</label>
        <input type="text" name="price" class="form-control">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" class="form-control">
    </div>

    <div class="form-group">
        <label for="store">Lojas</label>
        <select name="store" class="form-control">
            @foreach ($stores as $store)
            <option value="{{$store->id}}">{{$store->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit" class="btn btn-lg btn-success">Criar Produto</button>
    </div>

</form>

@endsection

