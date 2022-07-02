<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Юридическое обслуживание физических лиц в Москве</title>
    <meta name="description" content="Основой деятельности нашей коллегии является помощь физическим лицам в деле соблюдения их прав. В работе мы ориентируемся на индивидуальный подход и внимание к деталям, что позволяет успешно разрешать сложные вопросы.">
    <meta name="keywords" content="юридическое обслуживание физических лиц, Москва">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('img/ms-icon-144x144.png') }}">
    <meta name="yandex-verification" content="91cb8d59f5a8ac76">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

    <meta name='robots' content='max-image-preview:large' />

</head>

<body class="body customize-support" cz-shortcut-listen="true">
    @include('includes.header')
    <section class="bread">
        <div class="container">
            <!-- Breadcrumb NavXT 6.6.0 -->
            <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Перейти к Почетный Адвокатъ." href="{{ route('home') }}" class="home"><span property="name">Московская Коллегия Адвокатов</span></a>
                <meta property="position" content="1">
            </span> / <span property="itemListElement" typeof="ListItem"><span property="name" class="post post-page current-item">Сотрудники</span>
                <meta property="url" content="{{ route('personals.index') }}">
                <meta property="position" content="2">
            </span>
        </div>
    </section>
    <section class="home-three">
        <div class="page-title">
            <h1>Адвокаты</h1>
        </div>
        <div class="filter394">
            <div class="container">
                <div class="page-title">
                    Фильтр
                </div>

                <div class="filter-block">
                    <select name="qa" onchange="if (this.value) {window.location.href = '?qa='+this.value; }else{ window.location.href = '/personals/'; }">
                        <option>Все специальности</option>
                        <option value="advocate">Адвокаты</option>
                        <option value="lawyer">Юристы</option>
                    </select>


                </div>
            </div>

        </div>



        <div class="container">

            <div style="clear:both;"></div>
            @foreach ($personals as $personal)
                <div class="home-three-item">
                    <div class="ava" style="background: url({{ asset($personal->image) }}) center center; background-size:cover;"></div>
                    <h3>{{ $personal->fullname }}</h3>
                    <span>{{ $personal->speciality->title }}</span>
                    <span style="margin-top:-60px">{{ $personal->shurt_description }}</span>
                    <a style="margin-top:-10px" href="{{ route('personals.view_personal', $personal->chpu) }}">Подробнее</a>
                </div>
            @endforeach

        </div>
    </section>
    @include('includes.footer')
    <section class="copyright">
        <div class="container">© 2017-2022 - Почётный Адвокатъ. г. Москва, ул. Краснобогатырская, д.90 стр. 22, оф. 112 </div>
    </section>
    <div class="overlay"></div>
    <div class="popup" id="popup1">
        <img class="close" src="./Юридическое обслуживание физических лиц в Москве_files/cross.svg">
        <div class="popup-box">
            <div class="menu-top-menu-container">
                <ul id="menu-top-menu-1" class="menu">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-34"><a href="https://a-advokat.ru/yuridicheskoe-obsluzhivanie-fiz-lic/#">Специалисты</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-106"><a href="https://a-advokat.ru/personal/?qa=lawyer">Юристы</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-105"><a href="https://a-advokat.ru/personal/?qa=advocate">Адвокаты</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-107"><a href="https://a-advokat.ru/personal/">Консультанты</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-35"><a href="https://a-advokat.ru/">О коллегии</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-169"><a href="https://a-advokat.ru/news/">Новости</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-173"><a href="https://a-advokat.ru/article/">Статьи</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-110"><a href="https://a-advokat.ru/review/">Отзывы</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-111"><a href="https://a-advokat.ru/question/">Вопросы и ответы</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-616"><a href="https://a-advokat.ru/dostizheniya/">Наши достижения</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38"><a href="https://a-advokat.ru/kontakty">Контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
