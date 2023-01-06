<!DOCTYPE html>
<html>
<head>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

  <style type="text/css">
  header,
	main,
	footer {
	  padding-left: 240px;
	}

	body {
	  background: white;
      display: flex;
      min-height: 100vh;
      flex-direction: column;
	}

	@media only screen and (max-width: 992px) {
	  header,
	  main,
	  footer {
	    padding-left: 0;
	  }
	}
    main {
        flex: 1 0 auto;
    }

	#credits li,
	#credits li a {
	  color: white;
	}

	#credits li a {
	  font-weight: bold;
	}

	.footer-copyright .container,
	.footer-copyright .container a {
	  color: #BCC2E2;
	}

	.fab-tip {
	  position: fixed;
	  right: 85px;
	  padding: 0px 0.5rem;
	  text-align: right;
	  background-color: #323232;
	  border-radius: 2px;
	  color: #FFF;
	  width: auto;
	}
  </style>
</head>

<body>

  <ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
      <div class="indigo darken-2 white-text" style="height: 180px;">
        <div class="row">
          <img style="margin-top: 5%;" width="100" height="100" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463990208/photo_dkkrxc.png" class="circle responsive-img" />

          <p style="margin-top: -13%;">
          {{ Auth::user()->name }}
          </p>
        </div>
      </div>
    </li>

    <li id="dash_dashboard"><a class="waves-effect" href="#!"><b>Панель управления</b></a></li>

    <ul class="collapsible" data-collapsible="accordion">
      <li id="dash_users">
        <div id="dash_users_header" class="collapsible-header waves-effect"><b>Пользователи</b></div>
        <div id="dash_users_body" class="collapsible-body">
        <ul>
          <li id="dash_users_header">
            <a class="waves-effect" style="text-decoration: none;" href="#!">Клиенты</a>
            <a class="waves-effect" style="text-decoration: none;" href="#!">Сотрудники</a>
          </li>
        </ul>
      </li>
    </ul>
    <li id="dash_pages"><a class="waves-effect" href="pages.html"><b>Страницы</b></a></li>
  </ul>

  <header>
    <ul class="dropdown-content" id="user_dropdown" style="top: 50px">
      <li><a class="indigo-text" href="#!">Профиль</a></li>
      <li><a class="indigo-text" href="#!">Выйти</a></li>
    </ul>

    <nav class="indigo" role="navigation">
      <div class="nav-wrapper">
        <a data-activates="slide-out" class="button-collapse show-on-large" href="#!"><img style="margin-top: 17px; margin-left: 5px;" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989873/smaller-main-logo_3_bm40iv.gif" /></a>

        <ul class="right hide-on-med-and-down">
          <li>
            <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
          </li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>

    <nav>
      <div class="nav-wrapper indigo darken-2">
        <a style="margin-left: 20px;" class="breadcrumb" href="#!">Панель управления администратора</a>
        <a class="breadcrumb" href="#!">Изменение данных аккаунта</a>

        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
  </header>

  <main>
    <div class="row" style="padding-top: 20px;">
        <form class="col s7" method="post" action="{{ route('postprofile', $id) }}">
        {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="name" type="text" class="validate" name="name" value="{{ $name }}">
              <label for="name">Имя</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">vpn_key</i>
              <input id="password" type="password" name="password" class="validate">
              <label for="password">Пароль (только изменить)</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="email" type="email" class="validate" name="email" value="{{ $email }}">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">admin_panel_settings</i>
                <select name="role">
                  <option value="" disabled selected>Выбрать..</option>
                  <option value="1">Администратор</option>
                  <option value="2">Редактор</option>
                  <option value="0">Пользователь</option>
                </select>
                <label>Выберить роль пользователя</label>
              </div>
          </div>
          <div class="row">
              <button class="btn waves-effect waves-light col s6" type="submit" name="action">Сохранить
              <i class="material-icons right">send</i>
            </button>
           </div>
        </form>
        <div class="col s4 pull-s1">
            <div class="card white darken-1">
              <div class="card-content black-text">
                <span class="card-title">{{ $name }}</span>
                <p>Почта: {{ $email }} </p>
                <p>Роль: {{ $role }} </p>
              </div>
            </div>
          </div>
      </div>
  </main>

  <footer class="indigo page-footer">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h5 class="white-text">NFitness</h5>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        <span>Made By <a style='font-weight: bold;' href="https://vk.com/shokkcontent" target="_blank">contrerasoff</a></span>
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

  <script type="text/javascript">
  	$(document).ready(function() {
  		$('.button-collapse').sideNav();
		$('.collapsible').collapsible();
		$('select').material_select();
  	});
  </script>
</body>
</html>
