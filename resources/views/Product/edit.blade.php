@extends('layout.app')

@section('title','Edit')
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

<div class="fs-5">
    <form action="{{route('product.update', ['id'=>$product->id])}}" method="post">
        @csrf
        <div class="mt-3">
            <label for="product_name">製品名</label>
            <input class="form-control" type="text" name="name" id="product_name" value="{{$product->name}}">
        </div>

        <div class="mt-3">
            <label for="type_id">製品種別</label>
            <select name="type_id" id="type_id" class="form-control">
                @foreach($types as $type)
                <option value="{{$type->id}}" @if($product->type_id === $type->id) selected @endif >{{$type->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <lavel for="price">販売価格</lavel>
            <input class="form-control" type="text" name="price" id="price" value="{{$product->price}}">
        </div>

        <div class="mt-3">
            <input class="btn btn-primary" type="submit" value="更新">
        </div>

    </form>
    <a href="{{route('product')}}">戻る</a>
</div>
@endsection