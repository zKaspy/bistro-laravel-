<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
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
    <section class="about_company">
        <div class="container">
            <div class="about_company-title">
                О нас
            </div>
            <div class="about_company-info">
                Компания “Бистро Пицца” - новый уникальный продукт на рынке доставки еды нашего города. Мы учли все тонкости создания поке, натуральных соусов, итальянского теста для пиццы, и создали уникальный продукт, который соответствует самым высоким требованиям наших гостей. 
            </div>
            <div class="about_company-title">
                Поговорим о пицце 🍕
            </div>
            <ul class="about__pizza">
                <li>
                    <img src="img/about1.png" alt="">
                    <h3>Итальянское тесто</h3>
                    <div class="about__pizza-text">
                    Мы использовали классический рецепт итальянского тесто на тонкой основе, которое получается воздушным и пористый, сохраняя хрустящую корочку. Процесс приготовления опарным способом, занимает 2 дня. Готовится на итальянской муке из твердых сортов пшеницы. 
                    </div>
                </li>
                <li>
                    <img src="img/about2.png" alt="">
                    <h3>Сыр ручной работы</h3>
                    <div class="about__pizza-text">
                    Повара делают моцареллу непосредственно на нашей кухне из свежайшего молока, которое доставляют напрямую с фермерского хозяйства нашей области. Никаких долгосрочных хранений и вредных консервантов. 
                    </div>
                </li>
                <li>
                    <img src="img/about3.png" alt="">
                    <h3>Начинка высокого качества</h3>
                    <div class="about__pizza-text">
                    Подходя к выбору ингредиентов для наших пицц, мы отдали предпочтение продуктам высочайшего качества, а также приняли решение делать самостоятельно многие позиции, получая тот самый уникальный вкус: вяленые помидоры, копченая свинина с розмарином, домашняя сметана и майонез - вкус и польза для здоровья наших гостей. 
                    </div>
                </li>
                <li>
                    <img src="img/about4.png" alt="">
                    <h3>Вкусные бортики</h3>
                    <div class="about__pizza-text">
                    Мы не хотим, чтоб даже несколько грамм пиццы оставались в коробке, поэтому мы сделали невероятно вкусный бортик, смазанный ароматным чесночным маслом и присыпанный насыщенными приправами. 
                    </div>
                </li>
            </ul>
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
      <script>
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
        $( ".header__shop" ).click(function() {
        window.location.href = "{{ route('indexCart') }}";
        });
      </script>
</body>
</html>