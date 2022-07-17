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
            </span> / <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Перейти к Новости." href="{{ route('news.index') }}" class="news-root post post-news"><span property="name">Новости</span></a>
                <meta property="position" content="2">
            </span> / <span property="itemListElement" typeof="ListItem"><span property="name" class="post post-news current-item">{{ $news->title }}</span>
                <meta property="url" content="{{ route('news.view', $news->chpu) }}">
                <meta property="position" content="3">
            </span>
        </div>
    </section>
    <section class="home-one news-one" style="background: url({{ asset($news->image) }}) center center; background-size: cover;">
        <div class="container">
            <h1><span>{{ $news->title }}</span></h1>
            <span class="home-one-text">
                <span>{{ $news->short_description }} </span>
            </span>
        </div>
    </section>
    <section class="page-one">
        <div class="container">
            {!! $news->content !!}
            <video id="video" preload="metadata" src="{{ asset('video/1.mp4') }}" controls="" style="max-width:100%;height:auto">
                <source type="video/mp4" src=" {{ asset('video/1.mp4') }}">
            </video>
        </div>
    </section>
    <section class="home-six news-three">
        <div class="page-title">
            <h2>Другие новости</h2>
        </div>
        <div class="container">
            <div class="home-six-item item-564 ">
                <a class="nounderline" href="https://a-advokat.ru/news/dialog-v-studii/">

                    <div class="home-six-item-img" style="background: url(https://a-advokat.ru/wp-content/uploads/2021/02/dialog.jpg) center; background-size: cover;">
                        <div class="date">21.02.21</div>
                    </div>

                </a>
                <div class="home-six-item-box">
                    <h3> <a class="nounderline" href="https://a-advokat.ru/news/dialog-v-studii/"> Диалог в студии с адвокатом Волоцкой Ю.В.</a></h3>
                    <span>Детали дела Главы Фурмановского района Ивановской области стали доступны. </span>
                    <a href="https://a-advokat.ru/news/dialog-v-studii/">Подробнее</a>
                </div>
            </div>
            <div class="home-six-item item-561 ">
                <a class="nounderline" href="https://a-advokat.ru/news/3-goda-do-opravdatelnogo-prigovora/">

                    <div class="home-six-item-img" style="background: url(https://a-advokat.ru/wp-content/uploads/2021/11/3-goda-do-opravdatelnogo-prigovora-1.jpg) center; background-size: cover;">
                        <div class="date">22.01.21</div>
                    </div>

                </a>
                <div class="home-six-item-box">
                    <h3> <a class="nounderline" href="https://a-advokat.ru/news/3-goda-do-opravdatelnogo-prigovora/"> 3 года до оправдательного приговора</a></h3>
                    <span>Перед законом все равны, будь то чиновник или простой рабочий, но предвзятость - один из факторов,который может сыграть злую шутку. Опытный адвокат по уголовным делам - реальная помощь и поддержка в трудной жизненной ситуации.</span>
                    <a href="https://a-advokat.ru/news/3-goda-do-opravdatelnogo-prigovora/">Подробнее</a>
                </div>
            </div>
            <div class="home-six-item item-558 ">
                <a class="nounderline" href="https://a-advokat.ru/news/bankrotstvo-reshenie-problemi/">

                    <div class="home-six-item-img" style="background: url(https://a-advokat.ru/wp-content/uploads/2021/11/bankrotstvo-fiz-lic.jpg) center; background-size: cover;">
                        <div class="date">17.06.20</div>
                    </div>

                </a>
                <div class="home-six-item-box">
                    <h3> <a class="nounderline" href="https://a-advokat.ru/news/bankrotstvo-reshenie-problemi/"> Банкротство — решение проблемы!</a></h3>
                    <span>С 1 июня 2020 года наша коллегия адвокатов «Почетный Адвокатъ» возобновила работу по делам по банкротству физических лиц.</span>
                    <a href="https://a-advokat.ru/news/bankrotstvo-reshenie-problemi/">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="button-container">
            <a href="https://a-advokat.ru/news" class="button">Все новости</a>
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
