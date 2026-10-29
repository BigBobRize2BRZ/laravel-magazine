@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новый товар</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Новый товар</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Новый товар</h3>
                        </div>
                        <form role="form" method="post"
                            action="{{ route('products.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        id="title" placeholder="Название" value="{{ old('title') }}">
                                    @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                        id="content" rows="7" placeholder="Описание...">{{ old('content') }}</textarea>
                                    @error('content')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_id">Категория</label>
                                            <select class="form-control @error('category_id') is-invalid @enderror"
                                                id="category_id" name="category_id">
                                                @foreach($categories as $k => $v)
                                                <option value="{{ $k }}" @if(old('category_id')==$k) selected @endif>{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status_id">Статус</label>
                                            <select class="form-control @error('status_id') is-invalid @enderror"
                                                id="status_id" name="status_id">
                                                @foreach($statuses as $k => $v)
                                                <option value="{{ $k }}" @if(old('status_id')==$k) selected @endif>{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="price">Цена</label>
                                            <input type="number" step="0.01" name="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                id="price" value="{{ old('price', 0) }}">
                                            @error('price')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="old_price">Старая цена</label>
                                            <input type="number" step="0.01" name="old_price"
                                                class="form-control" id="old_price"
                                                value="{{ old('old_price', 0) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="img">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="img" id="img" class="custom-file-input">
                                            <label class="custom-file-label" for="img">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="hit" id="hit" value="1"
                                                class="form-check-input" @if(old('hit')) checked @endif>
                                            <label class="form-check-label" for="hit">Хит продаж</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="sale" id="sale" value="1"
                                                class="form-check-input" @if(old('sale')) checked @endif>
                                            <label class="form-check-label" for="sale">Скидка</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                <a href="{{ route('products.index') }}" class="btn btn-default">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection