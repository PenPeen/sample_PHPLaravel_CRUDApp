@extends('layout.app')

@section('title', 'Index')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>製品名</th>
            <th>製品種別</th>
            <th>販売価格</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->type_name}}</td>
            <td>{{$product->price}}</td>
            <td><a href="{{route('product.show', ['id'=>$product->id])}}">詳細</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$products->appends(request()->input())->links()}}
@endsection