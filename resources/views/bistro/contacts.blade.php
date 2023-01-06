<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contacts.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <title>Bistro - пиццерия в г. Ярославль</title>
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
    <section class="contacts">
        <div class="container">
            <div class="contacts__title">
                Контакты
            </div>
            <div class="contacts__wrapper">
                <div class="contacts__item">
                    г. Ярославль, ул. Советская, д.77
                </div>
                <div class="contacts__item">
                    <b>График работы:</b>
                    <p>Каждый день с 10:00 - 20:00</p>
                    <p>Выходные: сб, вс - с 10:00 - 18:00</p>
                </div>
            </div>
        <div class="map">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Af9b6908876abe3090eb4cc00da9a8aef9252aef03a212f1dbd2f7cf2d6e88798&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
        </div>
    </div>
    </section>
    <script>
    $( ".header__shop" ).click(function() {
        window.location.href = "{{ route('indexCart') }}";
    });
    </script>
</body>
</html>