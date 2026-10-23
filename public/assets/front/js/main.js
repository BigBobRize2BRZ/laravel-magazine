function showCart(cart) {
    $('#cart-modal .modal-body').html(cart);
    $('#cart-modal').modal('show');

    // Ищем количество товаров
    let qtyElement = $("#modal-cart-qty");
    let qtyText = qtyElement.length ? qtyElement.text().trim() : "0";
    let cartQty = parseInt(qtyText) || 0; 

    // Обновляем счетчик в шапке
    $('.mini-cart-qty').text(cartQty);

    // Ищем кнопки в подвале модального окна
    let footerButtons = $('#cart-modal .modal-footer .btn-cart');

    // Если товары есть - показываем, если нет - скрываем
    if (cartQty > 0) {
        footerButtons.removeClass('d-none');
    } else {
        footerButtons.addClass('d-none');
    }
}

function clearCart(action) {
    $.ajax({
        url: action,
        type: 'get',
        success: function (result) {
            showCart(result);
        },
        error: function () {
            alert('Ошибка при очистке корзины');
        }
    });
}

function getCart(action) {
    $.ajax({
        url: action,
        type: 'get', 
        success: function (result) {
            showCart(result);
        },
        error: function (xhr, status, error) {
            console.error('Ошибка загрузки корзины:', status, error);
            alert('Ошибка при загрузке корзины');
        }
    });
}

$(function () {
    // Добавление в корзину
    $('.addtocart').on('submit', function () {
        let form = $(this);
        let qtyInput = form.find('input[name="qty"]');
        let qty = parseInt(qtyInput.val());

        if (isNaN(qty) || qty < 1) {
            qtyInput.val(1);
        }

        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            type: 'post',
            success: function (result) {
                showCart(result);
            },
            error: function (msg) {
                alert('Error!');
                console.log(msg.responseJSON);
                form[0].reset();
            }
        });

        return false;
    });

    // Удаление одной позиции
    $('#cart-modal .modal-body').on('click', '.del-item', function() {
        $.ajax({
            url: $(this).data('action'),
            type: 'get',
            success: function (result) {
                showCart(result);
            },
            error: function (msg) {
                alert('Error!');
            }
        });
    });
});