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
            color: #fff;
            line-height: 40px;
            text-align: center;
            font-size: 16px;
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
            /* overflow-x: scroll; */
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

        .table_header .table_header_element.fio {
            width: 300px;
            /* overflow: hidden; */
        }

        .table_body {
            /* min-width: 1200px; */
            width: 100%;
            height: 400px;
            /* float: left; */
            /* padding: 0 15px; */
            /* background: #000; */
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

        .table_body_element.fio {
            width: 300px;
            overflow: hidden;
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

        footer {
            margin-top: 50px;
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

        .block_for_info h3 {
            display: block;
            height: 20px;
            line-height: 20px;
            text-align: center;
            margin-top: 30px;
            /* margin-bottom: ; */
        }

        .block_for_info .usluga {
            height: auto;
            line-height: 16px;
            padding: 0 15px;
            text-align: center;
            display: block;
        }

        .block_for_info .status {
            text-align: center;
            margin-top: 15px;
        }

        .block_for_info .fio,
        .block_for_info .email,
        .block_for_info .phone,
        .block_for_info .link {
            text-align: center;
            margin-top: 15px;
            padding: 0 15px;
            line-height: 16px;
            display: block;
        }
    </style>
</head>

<body class="body ">
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
        <div class="header">Все консултации <a href="{{ route('personal.logout') }}" style="margin-left: 20px;color:#fff;text-decoration:underline;"><i class="fa-solid fa-arrow-right-from-bracket" style="margin-right: 5px;"></i>Выйти</a></div>
        @if (isset($entries) && count($entries) > 0)
            <div class="table">
                <div class="table_header">
                    <div class="table_header_element">Дата и время</div>
                    <div class="table_header_element usluga">Услуга</div>
                    <div class="table_header_element status">Статус</div>
                    <div class="table_header_element fio">Фио клиента</div>
                    <div class="table_header_element">Ссылка </div>
                </div>
                <div class="table_body">
                    @foreach ($entries as $index => $entry)
                        <div class="table_body_element_list {{ $index % 2 == 0 ? 'active' : '' }}" data-entry_start_time="{{ $entry['entry']->entry_start_time }}" data-service_title="{{ $entry['service']->title }}" data-service_chpu={{ $entry['service']->chpu }}
                            data-status="{{ $entry['status'] }}" data-client_fio="{{ $entry['client']->name }}" data-client_email="{{ $entry['client']->email }}" data-client_phone="{{ $entry['client']->phone }}" data-link="{{ $entry['link'] }}">
                            <div class="table_body_element">{{ $entry['entry']->entry_start_time }}</div>
                            <a href="" class="table_body_element usluga">{{ $entry['service']->title }}</a>
                            <div class="table_body_element status">
                                @if ($entry['status'] == 'buyed')
                                    Оплачен
                                @elseif($entry['status'] == 'disabled')
                                    Отменен
                                @elseif($entry['status'] == 'not_buyed')
                                    Не оплачен
                                @endif
                            </div>
                            <div class="table_body_element fio">{{ $entry['client']->name }}</div>
                            <div class="table_body_element service">
                                @if ($entry['link'])
                                    <a target="_blank" href="{{ $entry['link'] }}">ссылка</a>
                                @endif
                            </div>
                            <div class="table_body_element btn_for_info">Информация</div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($client_entries->lastPage() > 1)
                <div class="paginate">
                    <a href="?page=1" class="first_page"><i class="fa-solid fa-angles-left"></i></a>
                    <a href="{{ $client_entries->previousPageUrl() }}" class="prev_page"><i class="fa-solid fa-angle-left"></i></a>
                    <div class="current_page">{{ $client_entries->currentPage() }}</div>
                    <a href="{{ $client_entries->nextPageUrl() }}" class="next_page"><i class="fa-solid fa-angle-right"></i></a>
                    <a href="?page={{ $client_entries->lastPage() }}" class="last_page"><i class="fa-solid fa-angles-right"></i></a>
                </div>
            @endif
        @else
            <p class="not_entries">У вас нет консултации</p>
        @endif

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
    <div class="bg_black hidden"></div>
    <div class="block_for_info hidden">
        <i class="fa-solid fa-xmark btn_for_hide_btn_for_info"></i>
        <h3>12.12.2022 03:00</h3>
        <a href="#" class="usluga">Консультация по гражданскому праву</a>
        <div class="status">Статис : оплачен</div>
        <h3>Контакты клиента</h3>
        <div class="fio">Фио : Omarov Agaly BkbkikiZ seurygflvsv neihlfgil rehgperhiewrh</div>
        <div class="email hidden">Email : omaraly971215@gmail.com</div>
        <div class="phone">Номер : +79871874976</div>
        <a href="#" class="link">Ссылка</a>
    </div>
    <script>
        const table = document.querySelector('div.table');
        const btn_for_hide_btn_for_info = document.querySelector('.btn_for_hide_btn_for_info');
        const bg_black = document.querySelector('.bg_black');
        if (btn_for_hide_btn_for_info) {
            btn_for_hide_btn_for_info.addEventListener('click', function(event) {
                document.querySelector('.bg_black').classList.add('hidden');
                document.querySelector('.block_for_info').classList.add('hidden');
            })
        }
        if (bg_black) {
            bg_black.addEventListener('click', function(event) {
                document.querySelector('.bg_black').classList.add('hidden');
                document.querySelector('.block_for_info').classList.add('hidden');
            })
        }
        if (table) {
            table.addEventListener('click', function(event) {
                if (event.target.classList.contains('btn_for_info')) {
                    const blockBodyElement = event.target.closest('.table_body_element_list');
                    const bg_black = document.querySelector('.bg_black');
                    const blockForInfo = document.querySelector('.block_for_info');
                    blockForInfo.querySelector('h3').textContent = blockBodyElement.dataset.entry_start_time;
                    blockForInfo.querySelector('.usluga').textContent = blockBodyElement.dataset.service_title;
                    blockForInfo.querySelector('.usluga').setAttribute('href', blockBodyElement.dataset.service_chpu);
                    let status = '';
                    if (blockBodyElement.dataset.status == 'buyed') {
                        status = 'Оплачен';
                    } else if (blockBodyElement.dataset.status == 'not_buyed') {
                        status = 'Не оплачен';
                    } else if (blockBodyElement.dataset.status == 'disabled') {
                        status = 'Отменен';
                    }
                    blockForInfo.querySelector('.status').textContent = status;
                    blockForInfo.querySelector('.fio').textContent = 'Фио : ' + blockBodyElement.dataset.client_fio;
                    if (blockBodyElement.dataset.client_email) {
                        blockForInfo.querySelector('.email').textContent = 'Email : ' + blockBodyElement.dataset.client_email;
                        blockForInfo.querySelector('.email').classList.hidden;
                    }
                    blockForInfo.querySelector('.phone').textContent = "Телефоне : " + blockBodyElement.dataset.client_phone;
                    blockForInfo.querySelector('.link').classList.remove('hidden');
                    blockForInfo.querySelector('.link').setAttribute('href', blockBodyElement.dataset.link);
                    if (!blockBodyElement.dataset.link) {
                        blockForInfo.querySelector('.link').classList.add('hidden');

                    }
                    blockForInfo.classList.remove('hidden');
                    bg_black.classList.remove('hidden');
                    // console.log(blockBodyElement);
                }

            })
        }
    </script>
</body>

</html>
