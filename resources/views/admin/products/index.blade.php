@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Товары</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Товары</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Список товаров</h3></div>
                        <div class="card-body">
                            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить товар</a>

                            @if(count($products))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px">#</th>
                                                <th>Фото</th>
                                                <th>Наименование</th>
                                                <th>Категория</th>
                                                <th>Статус</th>
                                                <th>Цена</th>
                                                <th>Хит</th>
                                                <th>Скидка</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>
                                                    <img src="{{ $product->getImage() }}"
                                                         alt="" width="60" class="img-thumbnail">
                                                </td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->category->title ?? '—' }}</td>
                                                <td>{{ $product->status->title ?? '—' }}</td>
                                                <td>{{ number_format($product->price, 0, '.', ' ') }} ₽</td>
                                                <td>{{ $product->hit ? 'Да' : '—' }}</td>
                                                <td>{{ $product->sale ? 'Да' : '—' }}</td>
                                                <td>
                                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                                          method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $products->links() }}
                            @else
                                <p>Товаров пока нет...</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection