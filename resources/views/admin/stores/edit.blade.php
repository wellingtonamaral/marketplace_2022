@extends('layouts.app')
@section('content')
<h1>Atualizar Loja</h1>

<form action="{{route('admin.stores.update', ['store' => $store->id])}}" method="POST" enctype="multipart/form-data">
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
    <p>
        <img src="{{asset('storage/' . $store->logo)}}" alt="">
    </p>
            <label>Fotos do Produto</label>
            <input type="file" name="logo" class="form-control">

        </div>


<div>
    <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
</div>

</form>

@endsection

