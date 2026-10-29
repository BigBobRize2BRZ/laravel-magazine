<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="{{ route('home') }}">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarColor01" aria-controls="navbarColor01" 
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    Главная <span class="sr-only">(current)</span>
                </a>
            </li>

            @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.show', ['slug' => $category->slug]) }}">
                        {{ $category->title }}
                    </a>
                </li>
            @endforeach

            <li class="nav-item">
                <button onclick="getCart('{{ route('cart.show') }}')" 
                        type="button" class="btn btn-primary">
                    Корзина
                    <span class="badge badge-light mini-cart-qty">
                        {{ session('cart_qty') ?? 0 }}
                    </span>
                </button>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" 
                       role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        @if(Auth::user()->is_admin)
                            <a class="dropdown-item" href="{{ route('admin.index') }}">
                                <i class="fas fa-cog"></i> Админ-панель
                            </a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="fas fa-sign-out-alt"></i> Выйти
                        </a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.create') }}">
                        <i class="fas fa-sign-in-alt"></i> Войти
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register.create') }}">
                        <i class="fas fa-user"></i> Регистрация
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>