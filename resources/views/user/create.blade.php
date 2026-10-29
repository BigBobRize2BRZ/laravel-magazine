@extends('layouts.layout')

@section('title')@parent :: Регистрация
@endsection

@section('content')

<form action="{{ route('register.store') }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password" placeholder="Пароль" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password_confirmation" placeholder="Повторите пароль" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Регистрация</button>
        </div>
    </div>
</form>

@endsection