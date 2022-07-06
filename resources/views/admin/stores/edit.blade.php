@extends('layouts.app')
@section('content')
<h1>Atualizar Loja</h1>

<form action="{{route('admin.stores.update', ['store' => $store->id])}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="form-group">
    <label>Nome Loja</label>
    <input type="text" name="name" id="" class="form-control" value="{{$store->name}}">
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" name="description" id="" class="form-control" value="{{$store->description}}">
</div>
<div class="form-group">
    <label>Telefone</label>
    <input type="text" name="phone" id="" class="form-control" value="{{$store->phone}}">
</div>
<div class="form-group">
    <label>Celular/Zap</label>
    <input type="text" name="mobile_phone" id="" class="form-control" value="{{$store->mobile_phone}}">
</div>
<div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug" id="" class="form-control" value="{{$store->slug}}">
</div>

<div>
    <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
</div>

</form>

@endsection

