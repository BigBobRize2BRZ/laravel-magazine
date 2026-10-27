@extends('layouts.layout')

@section('title')@parent :: Оформление заказа
@endsection

@section('content')

<form action="{{ route('register.store') }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="form-control">
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
        <input type="password" name="password" placeholder="Password" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password_confirmation" placeholder="Retype password" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </div>
</form>

@endsection