@extends('layouts.layout')

@section('title')@parent :: {{ $product->title }}
@endsection

@section('content')
    <div class="col-md-12">
        <h1>{{ $product->title }}</h1>
    </div>
    <div class="col-sm-4">
        <img src="{{ $product->getImage() }}" alt="{{ $product->title }}" class="img-thumbnail">
    </div>
    <div class="col-sm-8">
        <ul class="list-unstyled">
            <li>Категория: <a href="{{ route('categories.show', ['slug' => $product->category->slug]) }}">{{ $product->category->title }}</a></li>
            <li>Наличие: <i class="{{ $product->status->icon }}"></i> {{ $product->status->title }}</li>
            <li>Цена: <span class="card-price text-center">
                @if($product->old_price)
                    <del><small>@priceformat($product->old_price) руб.</small></del>
                @endif
                @priceformat($product->price) руб.
            </span></li>
        </ul>
        <form action="{{ route('cart.add') }}" method="post" class="addtocart">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <input type="text" name="qty" value="1" class="form-control">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-info btn-block cart-addtocart"><i class="fas fa-cart-arrow-down"></i>Купить</button>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <div class="product-desc">
            {{ $product->content }}
        </div>
    </div>
@endsection