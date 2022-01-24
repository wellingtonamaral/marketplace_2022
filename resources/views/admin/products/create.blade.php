@extends('layouts.app')
@section('content')

<h1>Criar loja</h1>
<form action=" {{Route('admin.stores.store')}} " method="post">
    <input type="hidden" name="_token" value=" {{csrf_token()}} ">
    <div class="form-group">
        <label>Nome loja</label>
        <input type="text" name="name" class="form-control">
    </div>

<div class="form-group">
    <label>Descrição</label>
    <input type="text" name="description" id="" class="form-control">
</div>
<div class="form-group">
    <label>Telefone</label>
    <input type="text" name="phone" id="" class="form-control">
</div>
<div class="form-group">
    <label>Celular/Zap</label>
    <input type="text" name="mobile_phone" id="" class="form-control">
</div>
<div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug" id="" class="form-control">
</div>
<div class="form-group">
    <label>Usuário</label>
    <select name="user" class="form-control">
    @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
    </select>
</div>
<div>
    <button type="submit" class="btn btn-lg btn-success">Criar Loja</button>
</div>

</form>

@endsection

