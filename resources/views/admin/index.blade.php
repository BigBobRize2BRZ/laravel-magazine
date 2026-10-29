@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Панель управления</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-4 col-6">
                    <a href="{{ route('products.index') }}" class="small-box bg-info d-block text-white">
                        <div class="inner">
                            <h3>{{ $stats['products_count'] }}</h3>
                            <p>Товаров</p>
                        </div>
                        <div class="icon"><i class="fas fa-box"></i></div>
                    </a>
                </div>

                <div class="col-lg-4 col-6">
                    <a href="{{ route('categories.index') }}" class="small-box bg-success d-block text-white">
                        <div class="inner">
                            <h3>{{ $stats['categories_count'] }}</h3>
                            <p>Категорий</p>
                        </div>
                        <div class="icon"><i class="fas fa-archive"></i></div>
                    </a>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $stats['orders_count'] }}</h3>
                            <p>Заказов</p>
                        </div>
                        <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection