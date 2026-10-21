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
            <li class="nav-item">
                <a class="nav-link" href="#">Гитары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Гитарное оборудование</a>
            </li>
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
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search"
                   placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0"
                    type="submit">Search</button>
        </form>
    </div>
</nav>

<!-- Модальное окно корзины -->
<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog"
     aria-labelledby="cart-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cart-modal-label">Корзина</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Сюда подгружается содержимое корзины -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>