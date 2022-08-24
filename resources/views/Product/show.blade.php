@extends('layout.app')

@section('title', 'Show')
@section('content')
<div class="fs-5">

    <div class="row">
        <div class="col-3 border">ID</div>
        <div class="col-9">{{$product->id}}</div>
    </div>

    <div class="row">
        <div class="col-3 border">製品名</div>
        <div class="col-9">{{$product->name}}</div>
    </div>

    <div class="row">
        <div class="col-3 border">製品種別</div>
        <div class="col-9">{{$product->type_name}}</div>
    </div>

    <div class="row">
        <div class="col-3 border">販売価格</div>
        <div class="col-9">{{$product->price}}</div>
    </div>

    <a class="me-3" href="{{route('product.edit', ['id'=>$product->id])}}">編集</a>
    <a class="me-3"  href="{{route('product')}}">戻る</a>
    
    <form id="delete_form" action="{{route('product.destory',['id'=>$product->id])}}" method="POST">
        @csrf
        <a href="#" onclick="deleteProductConfirm()">削除</a>
    </form>
</div>
@endsection
