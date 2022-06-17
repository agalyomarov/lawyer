<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Юридические услуги в Москве, услуги адвокатов московской коллегии</title>
    <meta name="description" content="Московская коллегия «Почетный Адвокатъ» оказывает услуги физическим и юридическим лицам, индивидуальным предпринимателям. Область нашей деятельности охватывает все отрасли права, помощь предоставляется на любой стадии дела." />
    <meta name="keywords" content="юридические, услуги, Москва, адвокатов, московская, коллегия, почетный, адвокат">
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
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

    {{-- <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('img/ms-icon-144x144.png') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://kit.fontawesome.com/aa53675e71.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' id='wp-customer-reviews-3-frontend-css' href='https://a-advokat.ru/wp-content/plugins/wp-customer-reviews/css/wp-customer-reviews.css?ver=3.6.2' type='text/css' media='all' />

    <style>
        .hidden {
            display: none;
            visibility: hidden;
            z-index: -999;
            position: absolute;
        }

        .content {
            width: 1200px;
            height: 80vh;
            /* background-color: none; */
            /* border: 0.5px solid silver; */
            margin: 0 auto;
        }

        .content .header {
            width: 100%;
            height: 40px;
            background: #6E171E;
            border-radius: 3px;
        }

        .content .header .list {
            line-height: 40px;
            color: #fff;
            display: inline-block;
            float: left;
            margin-left: 20px;
            font-size: 14px;
            padding: 0 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .content .header .list i {
            margin: 0 3px;

        }

        .content .header .list.active {
            background: #fff;
            color: #6E171E;
            /* border: 1px solid #6E171E; */
            border-left: none;
            border-right: none;
            line-height: 30px;
            margin-top: 5px;
            /* height: 35px; */
            border-radius: 5px;
        }

        form.data_form .form_input {
            width: 100%;
            height: auto;
            padding: 0 20px;
            display: inline-block;
            float: left;
            margin-top: 20px;
        }

        .form_input label {
            display: inline-block;
            width: 100%;
            float: left;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .form_input input {
            display: inline-block;
            width: 350px;
            height: 40px;
            line-height: 40px;
            padding: 0 10px;
            border: 2px solid #6E171E;
            border-radius: 3px;
        }

        .form_input input:hover,
        .form_input input:focus,
        .form_input input:active {
            border: 2px solid #6E171E;
            outline: none;
        }

        .form_input input.btn_for_save,
        .form_input input.btn_for_confirm {
            width: 375px;
            background-color: #6E171E;
            color: #fff;
            font-size: 14px;
            line-height: 40px;
            height: 40px;
            border: none;
            /* margin-top: 20px; */
        }

        .form_input input.btn_for_save.disabled {
            background-color: rgba(110, 23, 30, 0.4) !important;
        }

        .btn_for_turn_call {
            margin-top: 10px;
            width: 100%;
            padding: 0 20px;
            float: left;
            font-size: 14px;
            cursor: pointer;
        }

        .btn_for_turn_call.disabled {
            color: rgba(0, 0, 0, 0.3);
        }

        .table {
            width: 100%;
            height: auto;
            margin-top: 20px;
        }

        .table_header {
            width: calc(100% - 15px);
            height: 40px;
            font-size: 14px;
            border-bottom: 2px solid #6E171E;
            /* float: left; */
            padding-left: 15px;
        }

        .table_header .table_header_element {
            width: 130px;
            height: 40px;
            line-height: 40px;
            float: left;
            /* padding-left: 15px; */
        }

        .table_header .table_header_element.usluga {
            width: 350px;
        }

        .table_body {
            width: 100%;
            height: 400px;
            /* float: left; */
            /* padding: 0 15px; */
        }

        .table_body_element_list {
            width: 100%;
            height: 40px;
            font-size: 14px;
            float: left;
            padding-left: 15px;
        }

        .table_body_element_list.active {
            background-color: rgba(0, 0, 0, .1);
            padding-left: 15px;
            width: calc(100% - 15px);

        }

        .table_body_element {
            width: 130px;
            height: 40px;
            line-height: 40px;
            float: left;
            color: #000;
            cursor: pointer;
        }

        .table_body_element.usluga {
            width: 350px;
        }

        .footer {
            /* float: left !important; */
        }

        .bg_black {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100vw;
            min-height: 100vh;
            background-color: #000;
            opacity: 0.5;
            z-index: 1;
        }

        .block_for_info {
            width: 350px;
            height: auto;
            background-color: #fff;
            z-index: 2;
            position: fixed;
            top: 30px;
            left: calc(50vw - 175px);
            border-radius: 5px;
            padding-bottom: 40px;
        }

        .block_for_info i {
            display: inline-block;
            position: absolute;
            top: 5px;
            right: 5px;
            color: #fff;
            background-color: #6E171E;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 25px;
            font-size: 20px;
            border-radius: 50%;
        }

        .block_for_info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-left: calc(50% - 50px);
            margin-top: 40px;
        }

        .block_for_info .fio {
            width: 100%;
            height: 20px;
            line-height: 20px;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
            display: inline-block;
            text-decoration: underline;
        }

        .block_for_info .usluga {
            margin-top: 10px;
            width: 100%;
            /* height: 30px; */
            line-height: 20px;
            font-size: 14px;
            text-align: center;
        }

        .block_for_info .sena {
            width: 100%;
            /* height: 30px; */
            line-height: 20px;
            font-size: 14px;
            text-align: center;
        }

        .block_for_info .date_time {
            width: 100%;
            /* height: 30px; */
            line-height: 20px;
            font-size: 14px;
            text-align: center;
        }

        .block_for_info .status {
            width: 100%;
            /* height: 30px; */
            line-height: 20px;
            font-size: 14px;
            text-align: center;
        }

        .block_for_info .btn_for_disabled,
        .block_for_info .close_window {
            width: 80px;
            line-height: 20px;
            margin: 0 auto;
            font-size: 14px;
            margin-top: 20px;
            background-color: silver;
            border-radius: 5px;
            padding: 8px;
            text-align: center;
            cursor: pointer;
        }

        .block_for_info .close_window {
            width: 120px;
        }

        .block_for_info .btn_for_buyed {
            width: 80px;
            line-height: 20px;
            margin: 0 auto;
            font-size: 14px;
            margin-top: 10px;
            background-color: #6E171E;
            border-radius: 5px;
            padding: 8px;
            text-align: center;
            color: #fff
        }

        .block_for_info .link,
        .block_for_info .link_not_buyed,
        .block_for_info .link_buyed,
        .block_for_info .link_lasted {
            width: 200px;
            line-height: 18px;
            font-size: 14px;
            text-align: center;
            background-color: #6E171E;
            color: #fff;
            margin-top: 10px;
            border-radius: 5px;
            margin-left: calc(50% - 100px);
            /* margin-bottom: 40px; */
            cursor: pointer;
            display: block;
        }

        .block_for_info .link {
            line-height: 25px;
        }

        .paginate {
            height: 30px;
            width: 250px;
            margin: 0 auto;
            /* background-color: silver; */
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .paginate a {
            display: block;
            width: 43px;
            height: 30px;
            background-color: #6E171E;
            color: #fff;
            font-size: 16px;
            float: left;
            text-align: center;
            line-height: 30px;
            border-radius: 5px;
        }

        .paginate .current_page {
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-size: 16px;
        }

        @media (max-width: 1200px) {
            .content {
                width: 100%;
            }
        }

        @media (max-width: 400px) {
            .content .header .list span {
                display: none;
                visibility: hidden;
                position: absolute;
                z-index: -1;
            }
        }

        @media (max-width: 500px) {
            .content .header .list.logout span {
                display: none;
                visibility: hidden;
                position: absolute;
                z-index: -1;
            }
        }

        @media (max-width: 1150px) {

            .table_header_element.sena,
            .table_body_element.sena {
                display: none;
                visibility: hidden;
                position: absolute;
                z-index: -1;
            }
        }

        @media (max-width: 1115px) {

            .table_body_element.usluga,
            .table_header_element.usluga {
                display: none;
                visibility: hidden;
                position: absolute;
                z-index: -1;
            }
        }

        @media (max-width: 670px) {

            .table_header_element.status,
            .table_body_element.buyed,
            .table_body_element.disabled,
            .table_body_element.status,
            .table_header_element.not_name {
                display: none;
                visibility: hidden;
                position: absolute;
                z-index: -1;
            }
        }

        footer {
            margin-top: 50px;
        }

        div.not_entries {
            width: 100%;
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>

<body class="body">
    <header class="header">
        <div class="header-top">
            <div class="container">
                <a class="logo" href="/">
                    <span>Почетный Адвокатъ</span>
                    <span>московская коллегия адвокатов</span>
                </a>
                <div class="header-phones">
                    <img src="{{ asset('svg/phone.svg') }}">
                    <div class="header-numbers">
                        <a href="tel:+79671592479">+7 (967) 159-24-79</a>
                    </div>
                </div>
                <div class="adress-box">
                    <div class="header-adress">
                        <img src="{{ asset('svg/geo.svg') }}">
                        <span>ул.Краснобогатырская, д.90, стр.22, оф.112<br />
                            7мин. от м.Преображенская Площадь</span>
                    </div>
                    <div class="call">
                        <!-- Заказать обратный звонок-->
                    </div>
                </div>
                <div class="header-social">
                    <a href="https://wa.me/79671592479">
                        <img src="{{ asset('svg/wtsp.svg') }}">
                    </a>
                    <a href="https://www.instagram.com/volotskaya.advokat/">
                        <img src="{{ asset('svg/insta.svg') }}">
                    </a>
                    <a href="https://www.facebook.com/pg/advokat.info/posts/?ref=page_internal">
                        <img src="{{ asset('svg/fb.svg') }}">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="header">
            <div class="list"><span>Личный кабинет</span></div>
            <a href="{{ route('profile.logout') }}" class="list"><i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Выйти</span></a>
        </div>
        <div class="not_entries">У вас нет консултации</div>
    </div>

    @include('includes.footer')
    <section class="copyright">
        <div class="container">© 2017-2022 - Почётный Адвокатъ. г. Москва, ул. Краснобогатырская, д.90 стр. 22, оф. 112 </div>
    </section>
    <div class="overlay"></div>
    <div class="popup" id="popup1">
        <img class="close" src="https://a-advokat.ru/wp-content/themes/AlexMade/img/cross.svg">
        <div class="popup-box">
            <div class="menu-top-menu-container">
                <ul id="menu-top-menu-1" class="menu">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-34"><a href="#">Специалисты</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-106"><a href="/personal/?qa=lawyer">Юристы</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-105"><a href="/personal/?qa=advocate">Адвокаты</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-107"><a href="/personal/">Консультанты</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-has-children menu-item-35"><a href="/" aria-current="page">О коллегии</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-169"><a href="https://a-advokat.ru/news/">Новости</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-173"><a href="https://a-advokat.ru/article/">Статьи</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-110"><a href="/review/">Отзывы</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-111"><a href="/question/">Вопросы и ответы</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-616"><a href="https://a-advokat.ru/dostizheniya/">Наши достижения</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-38"><a href="/kontakty">Контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
