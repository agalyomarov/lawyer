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
            line-height: 40px;
            text-align: center;
            color: #fff
        }

        .form {
            width: 400px;
            height: 400px;
            /* border: 1px solid silver; */
            margin: 0 auto;
            margin-top: 30px;
            overflow: hidden;
            box-sizing: border-box;
        }

        footer {
            margin-top: 50px;
        }

        .form-control {
            width: 100%;
            height: auto;
            margin: 20px 0;
        }

        .form-control .label-control {
            width: 100%;
            display: inline-block;
            color: #6E171E;
        }

        .form-control .input-control {
            width: 93%;
            display: inline-block;
            margin-top: 5px;
            height: 35px;
            line-height: 35px;
            padding: 0 10px;
            border: 2px solid #6E171E;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }

        .form-control .button-control {
            display: inline-block;
            /* padding: 0px 20px; */
            background-color: #6E171E;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin: 0 auto;
            line-height: 35px;
            width: 80px;
            font-size: 16px;
            margin-left: calc(50% - 40px);
        }

        .message p {
            display: inline-block;
            text-align: center;
            width: 100%;
            color: red;
        }

        .btn_for_call {
            width: 260px;
            background-color: #6E171E;
            color: #fff;
            text-align: center;
            padding: 5px 10px;
            margin: 0 0 0 0;
            margin-left: calc(50% - 140px);
            border-radius: 5px;
            cursor: pointer;
        }

        .btn_for_call.disable,
        .btn_for_call.wait {
            color: rgb(192, 190, 190);
        }

        .message {
            text-align: center;
            color: red;
            font-size: 14px;
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
            Вход в личный кабинет
        </div>

        <div class="form">
            @if (session()->has('message'))
                <div class="message">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            {{-- <form action="{{ route('login_personal.store') }}" method="post"> --}}
            @csrf
            <div class="form-control">
                <label class="label-control">Номер тел.</label>
                <input id="oz_phone_input" type="text" class="input-control" name="phone" placeholder="+7 (___)___-__-__">
            </div>
            <div class="btn_for_call disable" data-second="59000" style="font-size: 15px">
                Получить звонок
            </div>
            <div class="form-control">
                <label class="label-control">Последный 4 цифры</label>
                <input type="text" class="input-control input_for_code" name="code">
            </div>
            <div class="message hidden"></div>
            <div class="form-control">
                <button type="button" class="button-control btn_for_confirm">Войти</button>
            </div>
            {{-- </form> --}}
        </div>
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
    <script src="{{ asset('js/jquery.inputmask.js') }}"></script>
    <script>
        $(function() {
            $('#oz_phone_input').inputmask({
                mask: "+7 (999)999-99-99",
                definitions: {
                    'X': {
                        validator: "9",
                        placeholder: "9"
                    }
                }
            });
        });

        const btn_for_call = document.querySelector('.btn_for_call');
        const oz_phone_input = document.querySelector('#oz_phone_input');
        const btn_for_confirm = document.querySelector('.btn_for_confirm');
        const input_for_code = document.querySelector('.input_for_code');
        const message = document.querySelector('.message');
        btn_for_call.addEventListener('click', function(event) {
            if (!this.classList.contains('disable') && !this.classList.contains('wait')) {
                this.classList.add('wait');
            }
        });

        setInterval(function() {
            if (oz_phone_input.value.replace(/\D/g, '').length == 11) {
                btn_for_call.classList.remove('disable');
            } else {
                btn_for_call.classList.add('disable');
            }
            if (btn_for_call.classList.contains('wait')) {
                let time = new Date(parseInt(btn_for_call.dataset.second)).getSeconds().toString();
                time = time.length == 1 ? "0" + time : time;
                btn_for_call.textContent = `Получить звонок через 00:${time}`;
                btn_for_call.dataset.second = parseInt(btn_for_call.dataset.second) - 1000;
                if (parseInt(time) == 0) {
                    btn_for_call.classList.remove('wait');
                    btn_for_call.textContent = 'Получить звонок';
                    btn_for_call.dataset.second = '59000';
                }
                // console.log(time);
            }
        }, 1000);
        btn_for_confirm.addEventListener('click', function(event) {
            // const code = input_for_code.value.trim();
            console.log(!oz_phone_input.value.replace(/\D/g, '').length != 11);
            if (oz_phone_input.value.replace(/\D/g, '').length != 11) {
                message.textContent = 'Введите корректный номер телефона';
                message.classList.remove('hidden');
                setTimeout(function() {
                    message.classList.add('hidden');
                    message.textContent = '';
                }, 2000);
            } else if (code.length < 4) {
                message.textContent = 'Введите последнюю 4 цифра ';
                message.classList.remove('hidden');
                setTimeout(function() {
                    message.classList.add('hidden');
                    message.textContent = '';
                }, 2000);
            } else {

            }
        })
    </script>
</body>

</html>
