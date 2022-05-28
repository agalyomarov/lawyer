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

        .form_input input.btn_for_save {
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
            <a href="{{ route('profile.index') }}" class="list {{ Route::has('profile.index') ? 'active' : '' }}"><i class="fa-solid fa-user"></i><span> Личные данные</span></a>
            <a href="" class="list"><i class="fa-solid fa-video"></i><span> Онлайн записи</span></a>
        </div>
        <form action="" class="data_form">
            <div class="form_input">
                <label for="name">Имя</label>
                <input type="text" name="name" placeholder="" id="name" value="{{ $client->name }}" data-name="{{ $client->name }}">
            </div>
            <div class="form_input">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="" id="email" value="{{ $client->email ? $client->email : '' }}" data-email={{ $client->email }}>
            </div>
            <div class="form_input">
                <label for="phone">Тел.номер</label>
                <input type="text" name="phone" placeholder="+7 (___)___-__-__" id="phone" value="{{ substr($client->phone, 1) }}" data-phone="{{ $client->phone }}">
            </div>
            <div class="form_input confirm_phone hidden">
                <input class="btn_for_save" type="button" value="Подвердить">
            </div>
            <div class="form_input">
                <input class="btn_for_save disabled" type="button" value="Сохранить">
            </div>
        </form>
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
    {{-- <script src="{{ asset('js/tabs.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.inputmask.js') }}"></script>

    <script>
        $(function() {
            $('#phone').inputmask({
                mask: "+7 (999)999-99-99",
                definitions: {
                    'X': {
                        validator: "9",
                        placeholder: "9"
                    }
                }
            });
        });

        const controlFormData = function() {
            const formData = document.querySelector('.content .data_form');
            const name = formData.querySelector('#name');
            const email = formData.querySelector('#email');
            const phone = formData.querySelector('#phone');
            const btnForSave = formData.querySelector('input.btn_for_save');
            if (name.value.trim().length > 3) {
                //  btnForSave.classList.remove('disabled');
                //  console.log(name.value);
            }
        }
        setInterval(controlFormData, 500);
    </script>
</body>

</html>
