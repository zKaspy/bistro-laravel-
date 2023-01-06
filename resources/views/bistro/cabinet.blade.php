<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cabinet.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    @toastr_css
    <script src="js/jquery.maskedinput.js"></script>
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
    <section class="cabinet">
    <div class="container">
        <div class="cabinet__title">
            Личный кабинет
        </div>
        <div class="cabinet__input">
            <form action="{{ route('cabinetPost') }}" method="post">
            {{ csrf_field() }}
                <div class="cabinet__input-item">
                    <label for="name" class="cab-label">Имя</label>
                    <input type="text" name="name" class="cab-input" value="{{ $user->name }}">
                </div>
                <div class="cabinet__input-item">
                    <label for="email" class="cab-label">Email адрес</label>
                    <input type="email" name="email" class="cab-input" value="{{ $user->email }}">
                </div>
                <div class="cabinet__input-item">
                    <label for="birthday" class="cab-label">Дата рождения</label>
                    <input type="text" name="birthday" class="cab-input datepicker" value="{{ $user->date_birthday }}">
                </div>
                <div class="cabinet__input-item">
                    <label for="delivery_street" class="cab-label">Адрес доставки</label>
                    <input type="text" name="delivery_street" class="cab-input" value="{{ $user->delivery_street }}">
                </div>
                <input type="submit" value="Сохранить все" class="cab-button">
            </form>
        </div>
        <div class="cabinet__title second-title">
            История заказов
        </div>
        @if (count($orders) >= 1)
        <table>
            <tr>
              <th><b>Номер заказа</b></th>
              <th><b>Дата заказа</b></th>
              <th><b>Статус заказа</b></th>
              <th><b>Сумма заказа</b></th>
              </tr>
            @foreach ($orders as $order)
            <tr>
              <td>#{{ $order -> id }}</td>
              <td>{{ $order -> created_at }}</td>
              @if ($order -> status == 1) 
              <td style="color: red">Заказ принят</td>
              @elseif ($order -> status == 2)
              <td style="color: yellow">Заказ доставляется</td>
              @elseif ($order -> status == 3)
              <td style="color: green">Заказ доставлен</td>
              @endif
              <td>{{ $order -> amount }} руб.</td>
            </tr>
            @endforeach
        </table>
        @else
            <p style="margin-left: 100px; margin-top: 10px;">Вы еще не делали заказов &#128580;</p>
        @endif
    </div>
    </section>
    <script>
    $( ".header__shop" ).click(function() {
        window.location.href = "{{ route('indexCart') }}";
    });
    $('.datepicker').mask('9999-99-99',{placeholder:"ГГГГ-ММ-ДД"});
    </script>
    @toastr_js
    @toastr_render
</body>
</html>