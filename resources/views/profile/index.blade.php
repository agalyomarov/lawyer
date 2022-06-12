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

        @media (max-width: 1200px) {
            .content {
                width: 100%;
            }
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

        @media (max-width: 410px) {
            .form_input input {
                width: 80%;
            }

            .form_input input.btn_for_save,
            .form_input input.btn_for_confirm {
                width: 86%;
            }

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
            <a href="{{ route('profile.index') }}" class="list {{ Route::is('profile.index') ? 'active' : '' }}"><i class="fa-solid fa-user"></i><span> Личные данные</span></a>
            <a href="{{ route('profile.entries') }}" class="list {{ Route::is('profile.entries') ? 'active' : '' }}"><i class="fa-solid fa-video"></i><span> Онлайн записи</span></a>
            <a href="{{ route('profile.logout') }}" class="list logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Выйти</span></a>
        </div>
        <form action="" class="data_form">
            <div class="form_input">
                <label for="name">Имя</label>
                <input type="text" name="name" placeholder="" id="name" value="{{ isset($client->name) ? $client->name : '' }}" data-name="{{ isset($client->name) ? $client->name : '' }}">
            </div>
            <div class="form_input">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="" id="email" value="{{ isset($client->email) ? $client->email : '' }}" data-email={{ isset($client->email) ? $client->email : '' }}>
            </div>
            <div class="form_input">
                <label for="phone">Тел.номер</label>
                <input type="text" name="phone" placeholder="+7 (___)___-__-__" id="phone" value="{{ isset($client->phone) ? substr($client->phone, 1) : '' }}" data-phone="{{ isset($client->phone) ? $client->phone : '' }}" data-confirmed='false'>
            </div>
            <div class="form_input input_confirm hidden">
                <input type="text" name="confirm" placeholder="Последный 4 цифр с звонка" id="confirm">
            </div>
            <div class="btn_for_turn_call disabled hidden">
                <i class="fa-solid fa-arrows-rotate"></i>
                <span>Отправить код повторно через <span class="time" data-time_value="59">0:59</span></span>
            </div>
            <div class="form_input confirm_phone hidden">
                <input class="btn_for_confirm" type="button" value="Подвердить">
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

        const controlFormData = () => {
            const formData = document.querySelector('.content .data_form');
            const name = formData.querySelector('#name');
            const email = formData.querySelector('#email');
            const phone = formData.querySelector('#phone');
            const btnForSave = formData.querySelector('input.btn_for_save');
            const btnForConfirmPhone = formData.querySelector('.confirm_phone');
            const regex = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');
            btnForSave.classList.add('disabled');
            // console.log(phone.value.replace(/\D/g, '').length);
            if (phone.value.replace(/\D/g, '').length == 11 && phone.dataset.confirmed == 'true') {
                btnForSave.classList.remove('disabled');
            } else {
                btnForSave.classList.add('disabled');
            }
            if (name.value.trim().length > 3 && name.value.trim() != name.dataset.name) {
                btnForSave.classList.remove('disabled');
            }
            if (email.value.trim() != email.dataset.email && regex.test(email.value.trim())) {
                btnForSave.classList.remove('disabled');
            }

            if (phone.value.replace(/\D/g, '').length == 11 && phone.value.replace(/\D/g, '') != phone.dataset.phone && phone.dataset.confirmed == 'false') {
                btnForConfirmPhone.classList.remove('hidden');
            }

        }
        setInterval(controlFormData, 500);
        const formData = document.querySelector('.content .data_form');
        const btnForConfirmPhone = formData.querySelector('.confirm_phone');

        btnForConfirmPhone.querySelector('input').addEventListener('click', function(e) {
            if (formData.querySelector('.input_confirm').classList.contains('hidden')) {
                const phone = formData.querySelector('#phone');
                const body = {};
                body.phone = phone.value.replace(/\D/g, '');
                // console.log(body);
                if (body.phone.length == 11) {
                    fetch('/verification/profile/phone', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(body)
                    }).then(res => {
                        return res.json();
                    }).then(data => {
                        // console.log(data);
                        if (data.status == true) {
                            formData.querySelector('.input_confirm').classList.remove('hidden');
                            formData.querySelector('.btn_for_turn_call').classList.remove('hidden');
                            const controlTurnCall = function() {
                                const btnForTurnCall = formData.querySelector('.btn_for_turn_call');
                                let time = parseInt(btnForTurnCall.querySelector('span.time').dataset.time_value);
                                if (time <= 0) {
                                    const interval_id = window.setInterval(function() {}, Number.MAX_SAFE_INTEGER);
                                    for (let i = 2; i < interval_id; i++) {
                                        window.clearInterval(i);
                                    }
                                    btnForTurnCall.innerHTML = `<i class="fa-solid fa-arrows-rotate"></i>
                                    <span> Отправить код повторно <span class="time" data-time_value=""></span></span >`;
                                    btnForTurnCall.classList.remove('disabled');
                                } else {
                                    const minute = parseInt(time / 60);
                                    let second = time - (minute * 60);
                                    if (second < 10) {
                                        second = `0${second}`;
                                    }
                                    btnForTurnCall.querySelector('span.time').textContent = `${minute}:${second}`;
                                    time--;
                                    btnForTurnCall.querySelector('span.time').dataset.time_value = time;
                                }
                            }
                            setInterval(controlTurnCall, 1000);
                            const btnForTurnCall = formData.querySelector('.btn_for_turn_call');
                            btnForTurnCall.addEventListener('click', function(event) {
                                const body = {};
                                body.phone = formData.querySelector('#phone').value.replace(/\D/g, '');
                                if (!e.target.classList.contains('disabled')) {
                                    fetch('/verification/profile/phone/call_turn', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                        },
                                        body: JSON.stringify(body)
                                    }).then(res => {
                                        // res.text().then(data => consoloe.log(data));
                                    })
                                    btnForTurnCall.innerHTML = `<i class="fa-solid fa-arrows-rotate"></i>
                <span>Отправить код повторно через <span class="time" data-time_value="59">0:59</span></span>`;
                                    btnForTurnCall.classList.add('disabled');
                                    const controlTurnCall = function() {
                                        const btnForTurnCall = formData.querySelector('.btn_for_turn_call');
                                        let time = parseInt(btnForTurnCall.querySelector('span.time').dataset.time_value);
                                        if (time <= 0) {
                                            const interval_id = window.setInterval(function() {}, Number.MAX_SAFE_INTEGER);
                                            for (let i = 2; i < interval_id; i++) {
                                                window.clearInterval(i);
                                            }
                                            setInterval(controlFormData, 500);
                                            btnForTurnCall.innerHTML = `<i class="fa-solid fa-arrows-rotate"></i>
                                    <span> Отправить код повторно <span class="time" data-time_value=""></span></span >`;
                                            btnForTurnCall.classList.remove('disabled');
                                        } else {
                                            const minute = parseInt(time / 60);
                                            let second = time - (minute * 60);
                                            if (second < 10) {
                                                second = `0${second}`;
                                            }
                                            btnForTurnCall.querySelector('span.time').textContent = `${minute}:${second}`;
                                            time--;
                                            btnForTurnCall.querySelector('span.time').dataset.time_value = time;
                                        }
                                    }
                                    setInterval(controlTurnCall, 1000);
                                }
                            })
                        } else {
                            window.location.reload();
                        }
                    })
                }
            } else {
                const phone = formData.querySelector('#phone');
                inputValue = formData.querySelector('.input_confirm input').value.trim();
                const body = {};
                body.phone = phone.value.replace(/\D/g, '');
                body.code = inputValue;
                // console.log(body);
                fetch('/verification/profile/phone/check', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(body)
                }).then(res => {
                    return res.json();
                }).then(data => {
                    if (data.status == true) {
                        // phone.dataset.phone = body.phone;
                        phone.dataset.confirmed = true;
                        phone.dataset.phone = body.phone;
                        formData.querySelector('.input_confirm').classList.add('hidden');
                        formData.querySelector('.confirm_phone').classList.add('hidden');
                        formData.querySelector('.btn_for_turn_call').classList.add('hidden');
                        const interval_id = window.setInterval(function() {}, Number.MAX_SAFE_INTEGER);
                        for (let i = 2; i < interval_id; i++) {
                            window.clearInterval(i);
                        }
                        setInterval(controlFormData, 500);
                        formData.querySelector('.btn_for_turn_call').innerHTML = `<i class="fa-solid fa-arrows-rotate"></i>
                <span>Отправить код повторно через <span class="time" data-time_value="59">0:59</span></span>`;
                    } else {
                        alert('Введен неверный код');
                    }
                })
            }
        })
        formData.querySelector('.btn_for_save').addEventListener('click', function(e) {
            if (!e.target.classList.contains('disabled')) {
                const phone = formData.querySelector('#phone');
                const name = formData.querySelector('#name');
                const email = formData.querySelector('#email');
                const body = {};
                body.name = name.value.trim();
                body.email = email.value.trim();
                body.phone = phone.value.replace(/\D/g, '');
                // console.log(body);
                fetch('/profile/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(body)
                }).then(res => {
                    // res.text().then(data => console.log(data));
                    return res.json();
                }).then(data => {
                    window.location.reload();
                })
            }

        })
    </script>
</body>

</html>
