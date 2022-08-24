@extends('layout.app')

@section('title', 'Create')
@section('content')

@if($errors->any())
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{route('product.store')}}" method="post">
    @csrf
    <div class="mt-3">
        <label for="product_name">製品名</label>
        <input class="form-control" type="text" name="name" id="product_name">
    </div>


    <div class="mt-3">
        <label for="type_id">製品種別</label>
        <select name="type_id" id="type_id" class="form-control">
            <option value="0">選択してください。</option>
            @foreach($types as $type)
            <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-3">
        <lavel for="price">販売価格</lavel>
        <input class="form-control" type="text" name="price" id="price">
    </div>

    <div class="mt-3">
        <input class="btn btn-primary" type="submit" value="登録">
    </div>

</form>
@endsection