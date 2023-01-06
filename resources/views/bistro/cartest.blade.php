<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cartest.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bistro - корзина</title>
</head>
<body>
<header class="header">
        <div class="header__logo">
            <div class="header__first">
                Eat and Go
            </div>
            <div href="" class="header__logo-second">
                <a href="{{ route('home') }}" style="color: #495057; text-decoration: none;">BISTRO.PIZZA</a>
            </div>
        </div>
        <div class="header__number">
            <div class="header__first">
                Телефон доставки
            </div>
            <div href="" class="header__number-second">
                +7(4852)255-308
            </div>
        </div>
        <div class="header__delivery">
            <div class="header__inner">
                <div class="header__first">
                    Бесплатная доставка
                </div>
                <div href="" class="header__delivery-second">
                    от 800 руб
                </div>
            </div>
            <div class="header__inner-logo">
                 <img src="img/visa.png" alt="" srcset="" width="38px" height="38px">
            </div>
        </div>
        <div class="header__delivery_time">
            <div class="header__first">
                Среднее время доставки
            </div>
            <div href="" class="header__delivery-second">
                60-80 минут
            </div>
        </div>
        <div class="header__shop">
            <div class="cart-icon">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            </div>
            <div class="header__inner">
                <div class="header__first">
                    Корзина
                </div>
                <div class="header__shop-second">
                    @if (Auth::check())
                    <span class="header__price">{{ \Cart::session(Auth::id())->getTotal() }}</span> руб
                    @else
                    <span class="header__price">0</span> руб
                    @endif
                </div>
            </div>
        </div>
    </header> 
    <div class="cart__wrapper">
        <div class="container">
            <div class="cart__main">
                <div class="cart__title">
                    Оформление заказа
                </div>
                <div class="cart__flex">
                <div class="cart__order">
                    <form action="{{ route('cartOrder') }}" method="post" class="cart__order-form">
                    @csrf
                    <p class="cart__form-title">Доставка</p>
                        <div class="cart__form-item">
                            <span>Телефон</span>
                            <input type="text" class="input-form number-input" name="tel">
                        </div>
                        <div class="cart__form-item">
                            <span>Адрес доставки</span>
                            <input type="text" class="input-form" name="delivery">
                        </div>
                        <div class="cart__form-item">
                            <span>Комментарий</span>
                            <input type="text" class="input-form" name="comment">
                        </div>
                        <div class="cart__form-item">
                            <input type="submit" class="button-form" value="Заказать">
                        </div>
                    </form>
                    @if (Session::has('error'))
                    <div class="alert-error">
                    <p>Заполните все поля!</p>
                    <p>Кол-во символов должно быть не более 255!</p>
                    </div>
                    @endif
                </div>
                    <div class="cart__order-history">
                        <div class="cart__order-history_top">
                            <div class="cart__order-history_title">
                                <span>Ваш заказ в ресторане</span>
                                <p>BISTRO.PIZZA</p>
                            </div>
                            <div class="cart__order-history_logo">
                                <img src="img/favicon.png" alt="logo" width="42px" height="42px">
                            </div>
                        </div>
                        <div class="cart__order_list">
                            <ul class="cart__order_list-ul">

                                @foreach ($items as $item)

                                <li class="cart__order_list-item">
                                    <div class="cart__order_list-item-title">

                                    @if ($item -> attributes -> ctg == 1)
                                        Пицца
                                    @elseif ($item -> attributes -> ctg == 4)
                                        Ролл
                                    @endif
                                    
                                    {{ $item -> name }}
                                    </div>
                                        <img src="img/minus.svg" alt="" width="10px" height="10px" class="subtractItem" data-item="{{ $item-> id }}">
                                    <div class="cart__order_list-item-qty">
                                    {{ $item -> quantity }}
                                    </div>
                                        <img src="img/plus.svg" alt=""  width="10px" height="10px" class="addItem" data-item="{{ $item-> id }}">
                                    <div class="cart__order_list-item-total" data-price="{{  $item -> price }}">
                                    {{ $item -> quantity * $item -> price  }} ₽
                                    </div>
                                </li>

                                @endforeach

                            </ul>
                        </div>
                        <div class="cart__order_total-sum">
                            <b>Итого: <span class="cart__order_total-sum-ajax">{{ \Cart::session(Auth::id())->getTotal() }}</span> ₽</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('.number-input').mask('+7 (999) 999-99-99');
    $( ".header__shop" ).click(function() {
        window.location.href = "{{ route('indexCart') }}";
    });
    $('.subtractItem').on('click', function (e) {
    e.preventDefault();
    let parent = this.parentNode;
    let qty = parseInt($(this).parent().find('.cart__order_list-item-qty').text());
    if (qty == 1) {
        $.ajax ({
            url: "{{ route('deleteCartItem') }}",
            type: "POST",
            data: {
                id: this.getAttribute('data-item'),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                $(this).parent(".cart__order_list-item").remove()
                $('.cart__order_total-sum-ajax').text(data.total)
                $('.header__price').text(data.total)
            }, 
        });
        } else {
            $.ajax ({
            url: "{{ route('minusCartItem') }}",
            type: "POST",
            data: {
                id: this.getAttribute('data-item'),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                $(this).parent().find('.cart__order_list-item-qty').text(data.qty)
                $(this).parent().find('.cart__order_list-item-total').text(data.sum + ' ₽')
                $('.cart__order_total-sum-ajax').text(data.total)
                $('.header__price').text(data.total)
            }, 
        }); 
        }
    });
    $('.addItem').on('click', function (e) {
    e.preventDefault();
    $.ajax ({
            url: " {{  route('plusCartItem') }}",
            type: "POST",
            data: {
                id: this.getAttribute('data-item'),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                $(this).parent().find('.cart__order_list-item-qty').text(data.qty)
                $(this).parent().find('.cart__order_list-item-total').text(data.sum + ' ₽')
                $('.cart__order_total-sum-ajax').text(data.total)
                $('.header__price').text(data.total)
                console.log(data)
            }, 
        });
    });
    </script>
</body>
</html>