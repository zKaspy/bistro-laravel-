<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="js/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="js/owlcarousel/assets/owl.theme.default.min.css">
    <script src="js/owlcarousel/owl.carousel.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    @toastr_css
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bistro - пиццерия в г. Ярославль</title>
</head>
<body>
    <header class="header">
        <div class="header__logo">
            <div class="header__first">
                Eat and Go
            </div>
            <div class="header__logo-second">
                <a href="{{ route('home') }}" style="color: #495057; text-decoration: none;">BISTRO.PIZZA</a>
            </div>
        </div>
        <div class="header-scrolled-nav">
            <ul class="header_scroll-nav">
                <li class=""><a href="{{ route('home') }}" style="text-decoration: none; color: #495057;">Главная</a></li>
                <li class=""><a href="{{ route('about') }}" style="text-decoration: none; color: #495057;">О нас</a></li>
                <li class=""><a href="{{ route('contacts') }}" style="text-decoration: none; color: #495057;">Контакты</a></li>
                @if (Auth::check())
                <li class=""><a href="{{ route('cabinet') }}" style="text-decoration: none; color: #495057;">Личный кабинет</a></li>
                <li class=""><a href="{{ route('logout') }}" style="text-decoration: none; color: #495057;">Выйти</a></li>
                @else
                <li class="header-scroll-item_login">Войти</li>
                @endif
            </ul>
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
                <div href="" class="header__shop-second">
                @if (Auth::check())
                <span class="header__price">{{ \Cart::session(Auth::id())->getTotal() }}</span> руб
                @else
                <span class="header__price">0</span> руб
                @endif
                </div>
            </div>
        </div>
    </header>
    <section class="main">
        <div class="owl-carousel">
            <div> 
                <img src="img/gallery/banner1.jpeg" alt="">
            </div>
            <div> 
                <img src="img/gallery/banner2.jpg" alt="">
            </div>
            <div> 
                <img src="img/gallery/banner3.jpg" alt="">
            </div>
          </div>
    </section>
    <section class="menu">
        <div class="container">
            <div class="menu__nav">
                <a href=".pizza31" class="menu__nav-item menu__nav-item--active"><h2>Пицца 31 см</h2></a>
                <a href=".poke" class="menu__nav-item"><h2>Поке</h2></a>
                <a href=".garnish" class="menu__nav-item"><h2>Гарнир</h2></a>
                <a href=".rolls" class="menu__nav-item"><h2>Роллы</h2></a>
                <a href=".sweets" class="menu__nav-item" ><h2>Десерты</h2></a>
                <a href=".bread" class="menu__nav-item"><h2>Выпечка</h2></a>
                <a href=".soup" class="menu__nav-item"><h2>Суп</h2></a>
                <a href=".souse" class="menu__nav-item"><h2>Соус</h2></a>
                <a href=".salads" class="menu__nav-item"><h2>Салаты</h2></a>
                <a href=".drinks" class="menu__nav-item" ><h2>Напитки</h2></a>
            </div>
        </div>
    </section>
    <section class="pizza31">
        <div class="container">
        <div class="card-list">

            @foreach($pizzas as $pizza)

            <div class="card-item"> <!-- Начало карточки -->
                <img src="{{ $pizza -> img }}" alt="" srcset="">
                <div class="card-item-desc">
                    <h3 class="card-item-title">
                    {{ $pizza -> title}}
                    </h3>
                    <div class="card-item-about">
                    {{ $pizza -> desc }}
                    </div>
                    <div class="card-item-size">
                    {{ $pizza -> weight }} г.
                    </div>
                    <div class="card-item-bottom">
                        <div class="card-item-price">
                        {{ $pizza -> price }} ₽
                        </div>
                        <div class="card-item-buy" data-id="{{ $pizza -> id }}" data-price="{{ $pizza -> price }}">
                            Выбрать
                        </div>
                    </div>
                </div>
            </div>  <!-- Конец карточки -->
            @endforeach
        </div>
    </div>
    </section>
    <section class="menu">
        <div class="container">
            <div class="menu__nav">
                <a href=".pizza31" class="menu__nav-item"><h2>Пицца 31 см</h2></a>
                <a href=".poke" class="menu__nav-item menu__nav-item--active"><h2>Поке</h2></a>
                <a href=".garnish" class="menu__nav-item"><h2>Гарнир</h2></a>
                <a href=".rolls" class="menu__nav-item"><h2>Роллы</h2></a>
                <a href=".sweets" class="menu__nav-item" ><h2>Десерты</h2></a>
                <a href=".bread" class="menu__nav-item"><h2>Выпечка</h2></a>
                <a href=".soup" class="menu__nav-item"><h2>Суп</h2></a>
                <a href=".souse" class="menu__nav-item"><h2>Соус</h2></a>
                <a href=".salads" class="menu__nav-item"><h2>Салаты</h2></a>
                <a href=".drinks" class="menu__nav-item" ><h2>Напитки</h2></a>
            </div>
        </div>
    </section>
    <section class="poke">
        <div class="container">
            <div class="card-list">

                 @foreach($pokes as $poke)

                <div class="card-item"> <!-- Начало карточки -->
                    <img src="{{ $poke -> img }}" alt="" srcset="">
                    <div class="card-item-desc">
                        <h3 class="card-item-title">
                        {{ $poke -> title  }}
                        </h3>
                        <div class="card-item-about">
                        {{ $poke -> desc  }}
                        </div>
                        <div class="card-item-size">
                        {{ $poke -> weight  }} г.
                        </div>
                        <div class="card-item-bottom">
                            <div class="card-item-price">
                            {{ $poke -> price  }} ₽
                            </div>
                            <div class="card-item-buy" data-id="{{ $poke -> id}}">
                                Выбрать
                            </div>
                        </div>
                    </div>
                </div>    <!-- Конец карточки -->
                @endforeach
            </div>
        </div>
    </section>
    <section class="menu">
        <div class="container">
            <div class="menu__nav">
                <a href=".pizza31" class="menu__nav-item"><h2>Пицца 31 см</h2></a>
                <a href=".poke" class="menu__nav-item"><h2>Поке</h2></a>
                <a href=".garnish" class="menu__nav-item menu__nav-item--active"><h2>Гарнир</h2></a>
                <a href=".rolls" class="menu__nav-item"><h2>Роллы</h2></a>
                <a href=".sweets" class="menu__nav-item" ><h2>Десерты</h2></a>
                <a href=".bread" class="menu__nav-item"><h2>Выпечка</h2></a>
                <a href=".soup" class="menu__nav-item"><h2>Суп</h2></a>
                <a href=".souse" class="menu__nav-item"><h2>Соус</h2></a>
                <a href=".salads" class="menu__nav-item"><h2>Салаты</h2></a>
                <a href=".drinks" class="menu__nav-item" ><h2>Напитки</h2></a>
            </div>
        </div>
    </section>
    <section class="garnish">
        <div class="container">
            <div class="card-list">

                 @foreach($garnishes as $garnish)

                <div class="card-item"> <!-- Начало карточки -->
                    <img src="{{ $garnish -> img }}" alt="" srcset="">
                    <div class="card-item-desc">
                        <h3 class="card-item-title">
                        {{ $garnish -> title  }}
                        </h3>
                        <div class="card-item-about">
                        {{ $garnish -> desc  }}
                        </div>
                        <div class="card-item-size">
                        {{ $garnish -> weight  }} г.
                        </div>
                        <div class="card-item-bottom">
                            <div class="card-item-price">
                            {{ $garnish -> price  }} ₽
                            </div>
                            <div class="card-item-buy" data-id="{{ $garnish -> id}}">
                                Выбрать
                            </div>
                        </div>
                    </div>
                </div>    <!-- Конец карточки -->
                @endforeach
            </div>
        </div>
    </section>
    <section class="menu">
        <div class="container">
            <div class="menu__nav">
                <a href=".pizza31" class="menu__nav-item"><h2>Пицца 31 см</h2></a>
                <a href=".poke" class="menu__nav-item"><h2>Поке</h2></a>
                <a href=".garnish" class="menu__nav-item"><h2>Гарнир</h2></a>
                <a href=".rolls" class="menu__nav-item menu__nav-item--active"><h2>Роллы</h2></a>
                <a href=".sweets" class="menu__nav-item" ><h2>Десерты</h2></a>
                <a href=".bread" class="menu__nav-item"><h2>Выпечка</h2></a>
                <a href=".soup" class="menu__nav-item"><h2>Суп</h2></a>
                <a href=".souse" class="menu__nav-item"><h2>Соус</h2></a>
                <a href=".salads" class="menu__nav-item"><h2>Салаты</h2></a>
                <a href=".drinks" class="menu__nav-item" ><h2>Напитки</h2></a>
            </div>
        </div>
    </section>
    <section class="rolls">
        <div class="container">
            <div class="card-list">

                 @foreach($rolls as $roll)

                <div class="card-item"> <!-- Начало карточки -->
                    <img src="{{ $roll -> img }}" alt="" srcset="">
                    <div class="card-item-desc">
                        <h3 class="card-item-title">
                        {{ $roll -> title  }}
                        </h3>
                        <div class="card-item-about">
                        {{ $roll -> desc  }}
                        </div>
                        <div class="card-item-size">
                        {{ $roll -> weight  }} г.
                        </div>
                        <div class="card-item-bottom">
                            <div class="card-item-price">
                            {{ $roll -> price  }} ₽
                            </div>
                            <div class="card-item-buy" data-id="{{ $roll -> id}}">
                                Выбрать
                            </div>
                        </div>
                    </div>
                </div>    <!-- Конец карточки -->
                @endforeach
            </div>
        </div>
    </section>
    <section class="menu">
        <div class="container">
            <div class="menu__nav">
                <a href=".pizza31" class="menu__nav-item"><h2>Пицца 31 см</h2></a>
                <a href=".poke" class="menu__nav-item"><h2>Поке</h2></a>
                <a href=".garnish" class="menu__nav-item"><h2>Гарнир</h2></a>
                <a href=".rolls" class="menu__nav-item"><h2>Роллы</h2></a>
                <a href=".sweets" class="menu__nav-item menu__nav-item--active" ><h2>Десерты</h2></a>
                <a href=".bread" class="menu__nav-item"><h2>Выпечка</h2></a>
                <a href=".soup" class="menu__nav-item"><h2>Суп</h2></a>
                <a href=".souse" class="menu__nav-item"><h2>Соус</h2></a>
                <a href=".salads" class="menu__nav-item"><h2>Салаты</h2></a>
                <a href=".drinks" class="menu__nav-item" ><h2>Напитки</h2></a>
            </div>
        </div>
    </section>
    <section class="sweets">
        <div class="container">
            <div class="card-list">

                 @foreach($sweets as $sweet)

                <div class="card-item"> <!-- Начало карточки -->
                    <img src="{{ $sweet -> img }}" alt="" srcset="">
                    <div class="card-item-desc">
                        <h3 class="card-item-title">
                        {{ $sweet -> title  }}
                        </h3>
                        <div class="card-item-about">
                        {{ $sweet -> desc  }}
                        </div>
                        <div class="card-item-size">
                        {{ $sweet -> weight  }} г.
                        </div>
                        <div class="card-item-bottom">
                            <div class="card-item-price">
                            {{ $sweet -> price  }} ₽
                            </div>
                            <div class="card-item-buy" data-id="{{ $sweet -> id}}">
                                Выбрать
                            </div>
                        </div>
                    </div>
                </div>    <!-- Конец карточки -->
                @endforeach
            </div>
        </div>
    </section>
    <section class="menu">
        <div class="container">
            <div class="menu__nav">
                <a href=".pizza31" class="menu__nav-item"><h2>Пицца 31 см</h2></a>
                <a href=".poke" class="menu__nav-item"><h2>Поке</h2></a>
                <a href=".garnish" class="menu__nav-item"><h2>Гарнир</h2></a>
                <a href=".rolls" class="menu__nav-item"><h2>Роллы</h2></a>
                <a href=".sweets" class="menu__nav-item"><h2>Десерты</h2></a>
                <a href=".bread" class="menu__nav-item menu__nav-item--active"><h2>Выпечка</h2></a>
                <a href=".soup" class="menu__nav-item"><h2>Суп</h2></a>
                <a href=".souse" class="menu__nav-item"><h2>Соус</h2></a>
                <a href=".salads" class="menu__nav-item"><h2>Салаты</h2></a>
                <a href=".drinks" class="menu__nav-item" ><h2>Напитки</h2></a>
            </div>
        </div>
    </section>
    <section class="bread">
        <div class="container">
            <div class="card-list">

                 @foreach($breads as $bread)

                <div class="card-item"> <!-- Начало карточки -->
                    <img src="{{ $bread -> img }}" alt="" srcset="">
                    <div class="card-item-desc">
                        <h3 class="card-item-title">
                        {{ $bread -> title  }}
                        </h3>
                        <div class="card-item-about">
                        {{ $bread -> desc  }}
                        </div>
                        <div class="card-item-size">
                        {{ $bread -> weight  }} г.
                        </div>
                        <div class="card-item-bottom">
                            <div class="card-item-price">
                            {{ $bread -> price  }} ₽
                            </div>
                            <div class="card-item-buy" data-id="{{ $bread -> id}}">
                                Выбрать
                            </div>
                        </div>
                    </div>
                </div>    <!-- Конец карточки -->
                @endforeach
            </div>
        </div>
    </section>
    <div class="burger_menu">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
    <div class="navigation__overlay">
        <div class="overlay-content">
          <a class="navigation__link" href="{{ route('home') }}">Главная</a>
          <a class="navigation__link" href="{{ route('about') }}">О нас</a>
          <a class="navigation__link" href="#">Акции</a>
          <a class="navigation__link" href="#">Контакты</a>
        </div>
      </div>
    <div class="menu-wrapper">
    <div class="login-menu">
        <div class="close-menu">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
          <h1 class="login-menu-title">
              Регистрация на сайте
          </h1>
          <form method="POST" class="reg-form" action="{{ route('register') }}">
          {{ csrf_field() }}
            Имя
            <input type="text" name="name" class="login-menu-item">
            Email
            <input type="email" name="email" class="login-menu-item">
            Пароль
            <input type="password" name="password" class="login-menu-item">
            <input type="submit" value="Отправить" class="reg-button">
          </form>
          <form method="POST" class="auth-form" action="{{ route('login') }}">
          {{ csrf_field() }}
            Email
            <input type="email" name="email" class="login-menu-item">
            Пароль
            <input type="password" name="password" class="login-menu-item">
            <div class="checkbox-group">
                <input type="checkbox" name="remember" class="remember-menu-item">Запомнить меня
            </div>
            <input type="submit" value="Войти" class="reg-button-login">
          </form>
          <div class="in-auth">
            Уже есть аккаунт? Войти
          </div>
    </div>
    </div>
    <script>
    /* 
        каруселька, в дальнейшем поиграться с настройками
    */
        $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayHoverPause: false
        });
    });
    /* Плавный переход по якорю
        туду: переписать на чистый js
    */
    $('.menu__nav-item').on('click', function() {
        let href = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(href).offset().top
        }, {
            duration: 370,  
            easing: "linear" 
        });

        return false;
        });
        // бургер меню
        $(document).ready(function () {
            let status = false;
            $('.burger_menu').click(function () {
                if (status == false) {
                document.querySelector('.navigation__overlay').style.display = "block";
                status = true;
                } else if (status == true) {
                document.querySelector('.navigation__overlay').style.display = "none";
                status = false;
                }
            });
        });
        // обработчик добавления товара в корзину
        $(document).ready(function () {

            for (var i = 0; i < document.querySelectorAll('.card-item').length; i++) {
            addEvent(document.querySelectorAll('.card-item')[i].querySelector('.card-item-buy'), 'click', addtocart);
            }
            function addEvent(elem, type, handler){
                if (elem.addEventListener) {
                    elem.addEventListener(type, handler, false);
                } else {
                    elem.attachEvent('on' + type , function () { handler.call( elem ); });
                }
                return false;
            }
        })

        function addtocart() {
            let parent = this.parentNode;
            let sum = parseInt($('.header__price').text())
            let price = parseInt(parent.querySelector('.card-item-price').innerHTML);

            console.log(price)
            console.log(sum)

            sum += price
            $('.header__price').text(sum)

            $.ajax ({
                url: "{{ route('addtocart') }}",
                type: "POST",
                data: {
                    id: this.getAttribute('data-id'),
                },
                headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data)
                }, 
                error: (data) => {
                    if (data.status == 401) {
                        $('.header__price').text('0')
                        console.log('Вы не авторизованы')
                        toastr.error('Вы не авторизованы')
                        toastr.info('Чтобы сделать заказ, войдите в систему')
                    }
                }
            });
        }
        $(window).on("scroll", function () {
        var scrolled = $(this).scrollTop();
        if( scrolled > 100 ) {
            document.querySelector('.header__delivery_time').style.display = 'none';
            document.querySelector('.header__number').style.display = 'none';
            document.querySelector('.header__delivery').style.display = 'none';
            document.querySelector('.header-scrolled-nav').style.display = 'flex';
            document.querySelector('.header_scroll-nav').style.display = 'flex';
            document.querySelector('.main').style.paddingTop = '10';
            document.querySelector('.header').style.position = 'fixed';
        }   
        if( scrolled <=  100 ) {     
            document.querySelector('.header__delivery_time').style.display = 'block';
            document.querySelector('.header__number').style.display = 'block';
            document.querySelector('.header__delivery').style.display = 'flex';
            document.querySelector('.header-scrolled-nav').style.display = 'none';
            document.querySelector('.header_scroll-nav').style.display = 'none';
            document.querySelector('.header').style.position = 'relative';
        }
        });
        $('.header-scroll-item_login').on('click', function() {
            document.querySelector('.menu-wrapper').style.visibility = 'visible';
            document.body.style.overflow = 'hidden';
        });
        $('.close-menu').on('click', function() {
            document.querySelector('.menu-wrapper').style.visibility = 'hidden';
            document.body.style.overflow = 'auto';
        });
        $('.in-auth').on('click', function () {
            document.querySelector('.reg-form').style.display = 'none';
            document.querySelector('.auth-form').style.display = 'flex';
            document.querySelector('.login-menu').style.height = '280px';
            document.querySelector('.in-auth').style.display = 'none';
            $('.login-menu-title').text('Войти на сайт');
        });
        $( ".header__shop" ).click(function() {
        window.location.href = "{{ route('indexCart') }}";
        });
    </script>
    @toastr_js
    @toastr_render
</body>
</html>