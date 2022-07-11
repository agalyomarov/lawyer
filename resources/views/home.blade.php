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
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('img/ms-icon-144x144.png') }}">
    <meta name="yandex-verification" content="91cb8d59f5a8ac76" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://kit.fontawesome.com/aa53675e71.js" crossorigin="anonymous"></script>
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel='stylesheet' id='wp-customer-reviews-3-frontend-css' href='{{ asset('css/wp-customer-reviews.css?ver=3.6.2') }}' type='text/css' media='all' />

    <style>
        .hidden {
            display: none;
            visibility: hidden;
            z-index: -999;
        }

        .oz_hid .ui-datepicker-calendar tbody td[data-handler="selectDay"] span {
            color: #6E171E !important;
            position: relative !important;
            font-weight: bold !important;
            display: inline !important;
            border: none !important;
            text-decoration: none !important;
            box-shadow: none !important;
            cursor: pointer !important;
        }

        .oz_hid .ui-datepicker-calendar tbody td[data-handler="selectDay"] span:after {
            content: '';
            display: table;
            border-radius: 50%;
            background: #6E171E;
            width: 4px;
            height: 4px;
            position: absolute;
            top: -2px;
            right: -5px;
        }

        .form_fields .star_for_name {
            display: inline;
            position: relative;
            right: 0;
        }

        .form_fields .label_input_name {
            position: relative;
        }

        .form_fields .label_input_name .star_for_name {
            position: absolute;
            color: red;
            top: 15.5px;
            right: 8px;
        }

        .form_fields .label_input_phone {
            position: relative;
        }

        .form_fields .label_input_phone .star_for_phone {
            position: absolute;
            color: red;
            top: 15.5px;
            right: 8px;
        }

        .form_fields .oz_submit.oz_btn {
            background: #6E171E;
            height: 40px;
        }

        .block_for_phone_verify {
            width: 100%;
            height: auto;
            /* background-color: #fff; */
        }

        .block_for_phone_verify .block {
            padding: 40px 20px;
            width: 400px;
            height: auto;
            background-color: #fff;
            margin: 0 auto;
        }

        .block_for_phone_verify .block p.block_title {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
            padding: 0;
        }

        .block_for_phone_verify .block p.block_description {
            font-size: 13px;
            margin-top: 5px;
        }

        .block_for_phone_verify .block label {
            display: inline-block;
            margin-top: 30px;
            width: 100%;
            font-size: 15px;
        }

        .block_for_phone_verify .block input.result {
            display: inline-block;
            width: 100%;
            height: 40px;
            font-size: 15px;
            border-radius: 5px;
            padding: 0 10px;
        }

        .block_for_phone_verify .block .block_turn {
            margin: 0;
            padding: 0;
            display: inline-block;
            width: 100%;
            font-size: 13px;
            margin-top: 10px;
            cursor: pointer;
        }

        .block_for_phone_verify .block .block_turn.disabled {
            color: rgba(0, 0, 0, 0.3);
        }

        .block_for_phone_verify .block .block_turn i {
            margin-right: 5px;
        }

        .block_for_phone_verify .block input.btn_send {
            margin-top: 50px;
            width: 100%;
            height: 40px;
            background: #6E171E;
            color: #fff;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .block_for_phone_verify .block input.btn_send.disabled {
            background-color: rgba(110, 23, 30, 0.4) !important;
        }

        .btn_for_zabronirovat.disabled {
            background-color: rgba(110, 23, 30, 0.4) !important;
        }

        p.msg_for_client {
            color: red;
            font-size: 12px;
            margin-top: 20px;
            margin-bottom: -30px;
        }
    </style>
</head>

<body class="body">
    @include('includes.header')

    <section class="home-one">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background: url({{ asset('images/advokat-v-rasrochku.jpg') }}) top center; background-size: cover;">
                    <div class="container">
                        <h1>
                            <span>Услуги адвокатов в рассрочку!</span>
                        </h1>
                        <span class="home-one-text">
                            <span>Своевременная помощь</span>
                            <span>от квалифицированных</span>
                            <span>адвокатов и юристов</span></span>
                        <a href="/news/uslugi-advokatov-v-rassrochku/" class="button">Подробнее</a>
                    </div>
                </div>
                <div class="swiper-slide" style="background: url({{ asset('images/yurist.jpg') }}) top center; background-size: cover;">
                    <div class="container">
                        <h1>
                            <span>Бесплатные консультации!</span>
                            <span>В последнюю субботу месяца.</span>
                        </h1>
                        <span class="home-one-text">
                            <span>День открытых дверей!</span>
                            <span>с 10:00 до 18:00</span></span>
                        <a href="/news/besplatnie-konsultatsii/" class="button">Подробнее</a>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <section class="break">
        <div class="container">
            <a href="{{ route('serviceForSimpleClient.index') }}/" class="button">Физическим лицам</a>
            <a href="{{ route('serviceForYuridLic.index') }}/" class="button">Юридическим лицам</a>
        </div>
    </section>
    <section class="home-two">
        <div class="page-title">
            <h2>Выбрать специализацию</h2>
        </div>
        <div class="container">
            <ul>
                @foreach ($services as $service)
                    <li><a href="{{ route('service.index', $service->chpu) }}/">{{ $service->title }}</a></li>
                @endforeach
                {{-- <li><a href="https://a-advokat.ru/services/konsultacziya-po-semejnym-otnosheniyam/">Консультация по семейным отношениям</a></li>
                <li><a href="https://a-advokat.ru/services/konsultacziya-po-ugolovnomu-pravu/">Консультация по уголовному праву</a></li>
                <li><a href="https://a-advokat.ru/services/administrativnoe-pravo/">Консультация по административному праву</a></li> --}}
            </ul>
        </div>
    </section>
    <section class="home-three">
        <div class="page-title">
            <h2>Выберите консультанта</h2>
        </div>
        <div class="container">
            <div class="home-three-item">
                <div class="ava" style="background: url({{ asset('images/Снимок-экрана-2021-06-22-в-13.23.40.png') }}) center center; background-size:cover;"></div>
                <h3>Личное: Архарова Яна Германовна</h3>
                <span class="specialnost">Юрист</span>
                <span>Небольшой текст об специалисте</span>
                <a href="https://a-advokat.ru/personal/arharova-yana-germanovna/">Подробнее</a>
            </div>
        </div>
        <div class="button-container">
            <a href="{{ route('personals.index') }}" class="button">Полный каталог консультантов</a>
        </div>
    </section>
    <section class="home-four home-oz">
        <div class="page-title">
            <h2>Расписание консультаций</h2>
        </div>
        <div class="container">
            <div data-atts="[]" id="oz_appointment">
                <div class="oz_container  container-default-theme ">
                    <div class="text-center">
                        <div class="oz_my_app_block">
                            <div class="">
                                <a href="/profile" class="oz_link ea_my_app">
                                    {{-- <svg version="1.1" id="oz_arrow" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="444.819px" height="444.819px" viewBox="0 0 444.819 444.819">
                                        <path
                                            d="M434.252,114.203l-21.409-21.416c-7.419-7.04-16.084-10.561-25.975-10.561c-10.095,0-18.657,3.521-25.7,10.561L222.41,231.549L83.653,92.791c-7.042-7.04-15.606-10.561-25.697-10.561c-9.896,0-18.559,3.521-25.979,10.561l-21.128,21.416C3.615,121.436,0,130.099,0,140.188c0,10.277,3.619,18.842,10.848,25.693l185.864,185.865c6.855,7.23,15.416,10.848,25.697,10.848c10.088,0,18.75-3.617,25.977-10.848l185.865-185.865c7.043-7.044,10.567-15.608,10.567-25.693C444.819,130.287,441.295,121.629,434.252,114.203z">
                                        </path>
                                    </svg> --}}
                                    Мои записи
                                </a>
                                <div class="oz_user_popup_overlay" style="width: 1200px;">
                                    <div class="oz_user_popup">
                                        <ul class="oz_booking_list">
                                            <li>У вас пока что нет записей</li>
                                        </ul>
                                    </div>
                                    <div class="oz_user_popup-bar">
                                        <div class="oz_user_popup-bar-wrap oz_flex"><a class="oz_user_popup-logout oz_link" href="https://a-advokat.ru/wp-login.php?action=logout&amp;redirect_to=https%3A%2F%2Fa-advokat.ru%2F&amp;_wpnonce=6a83db9bff">Выйти</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oz_back_btn fadeOutTop" onClick="oz_back_btn(this)">Назад</div>
                        <h3 class="stepname">Выберите дату</h3>
                    </div>
                    <div class="oz_hid default-theme ">
                        <div class="oz_hid_carousel" style="transform: translateX(0);">
                            <div class="oz_date active">
                                <div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;">
                                    <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all">
                                        <a class="ui-datepicker-prev ui-corner-all ui-state-disabled" title="Назад">
                                            <span class="ui-icon ui-icon-circle-triangle-w calendar_last">Назад</span>
                                        </a>
                                        <a class="ui-datepicker-next ui-corner-all" title="Далее">
                                            <span class="ui-icon ui-icon-circle-triangle-e calendar_next">Далее</span>
                                        </a>
                                        <div class="ui-datepicker-title">
                                            <span class="ui-datepicker-month" data-thismonth='{{ $thisMonth->monthName }}' data-nextmonth="{{ $nextMonth->monthName }}">{{ $thisMonth->monthName }}</span>
                                            &nbsp;
                                            <span class="ui-datepicker-year" data-thismonth='{{ $thisMonth->year }}' data-nextmonth="{{ $nextMonth->year }}">{{ $thisMonth->year }}</span>
                                        </div>
                                    </div>
                                    <table class="ui-datepicker-calendar">
                                        <thead>
                                            <tr>
                                                <th scope="col"><span title="Понедельник">Пн</span></th>
                                                <th scope="col"><span title="Вторник">Вт</span></th>
                                                <th scope="col"><span title="Среда">Ср</span></th>
                                                <th scope="col"><span title="Четверг">Чт</span></th>
                                                <th scope="col"><span title="Пятница">Пт</span></th>
                                                <th scope="col" class="ui-datepicker-week-end"><span title="Суббота">Сб</span></th>
                                                <th scope="col" class="ui-datepicker-week-end"><span title="Воскресенье">Вс</span></th>
                                            </tr>
                                        </thead>
                                        <tbody id="thisMonth" class="">
                                            @foreach ($thisMonth->week as $week)
                                                <tr>
                                                    @foreach ($week as $day)
                                                        @if (isset($day['simpleDay']) && $day['simpleDay'])
                                                            @if (isset($day['entryDay']) && $day['entryDay'])
                                                                <td data-handler="selectDay" class="selectedDay" data-date="{{ $day['currentDate'] }}">
                                                                    <span class="ui-state-default selectedDay" data-date="{{ $day['currentDate'] }}"> {{ $day['currentDay'] }}</span>
                                                                </td>
                                                            @else
                                                                <td class="ui-datepicker-unselectable ui-state-disabled undefined">
                                                                    <span class="ui-state-default">
                                                                        {{ $day['currentDay'] }}
                                                                    </span>
                                                                </td>
                                                            @endif
                                                        @else
                                                            <td class="ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled"></td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tbody id="nextMonth" class="hidden">
                                            @foreach ($nextMonth->week as $week)
                                                <tr>
                                                    @foreach ($week as $day)
                                                        @if (isset($day['simpleDay']) && $day['simpleDay'])
                                                            @if (isset($day['entryDay']) && $day['entryDay'])
                                                                <td data-handler="selectDay" class="selectedDay" data-date="{{ $day['currentDate'] }}">
                                                                    <span class="ui-state-default selectedDay" data-date="{{ $day['currentDate'] }}"> {{ $day['currentDay'] }}</span>
                                                                </td>
                                                            @else
                                                                <td class="ui-datepicker-unselectable ui-state-disabled undefined">
                                                                    <span class="ui-state-default">
                                                                        {{ $day['currentDay'] }}
                                                                    </span>
                                                                </td>
                                                            @endif
                                                        @else
                                                            <td class="ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled"></td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="oz_time">
                                <ul class=" list_hourses">
                                    <li class="zagday timerU squaredThree no_slots">Утро</li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-03" type="checkbox" value="03:00"><label class='check_time' for="time-03" data-time="03:00">03:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-04" type="checkbox" value="04:00"><label class='check_time' for="time-04" data-time="04:00">04:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-05" type="checkbox" value="05:00"><label class='check_time' for="time-05" data-time="05:00">05:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-06" type="checkbox" value="06:00"><label class='check_time' for="time-06" data-time="06:00">06:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-07" type="checkbox" value="07:00"><label class='check_time' for="time-07" data-time="07:00">07:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-08" type="checkbox" value="08:00"><label class='check_time' for="time-08" data-time="08:00">08:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-09" type="checkbox" value="09:00"><label class='check_time' for="time-09" data-time="09:00">09:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-10" type="checkbox" value="10:00"><label class='check_time' for="time-10" data-time="10:00">10:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-11" type="checkbox" value="11:00"><label class='check_time' for="time-11" data-time="11:00">11:00 </label></li>
                                    <li class="zagday timerD squaredThree no_slots">День</li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-12" type="checkbox" value="12:00"><label class='check_time' for="time-12" data-time="12:00">12:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-13" type="checkbox" value="13:00"><label class='check_time' for="time-13" data-time="13:00">13:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-14" type="checkbox" value="14:00"><label class='check_time' for="time-14" data-time="14:00">14:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-15" type="checkbox" value="15:00"><label class='check_time' for="time-15" data-time="15:00">15:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-16" type="checkbox" value="16:00"><label class='check_time' for="time-16" data-time="16:00">16:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-17" type="checkbox" value="17:00"><label class='check_time' for="time-17" data-time="17:00">17:00 </label></li>
                                    <li class="zagday timerE squaredThree no_slots">Вечер</li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-18" type="checkbox" value="18:00"><label class='check_time' for="time-18" data-time="18:00">18:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-19" type="checkbox" value="19:00"><label class='check_time' for="time-19" data-time="19:00">19:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-20" type="checkbox" value="20:00"><label class='check_time' for="time-20" data-time="20:00">20:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-21" type="checkbox" value="21:00"><label class='check_time' for="time-21" data-time="21:00">21:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-22" type="checkbox" value="22:00"><label class='check_time' for="time-22" data-time="22:00">22:00 </label></li>
                                    <li class="squaredThree oz_not_allowed"><input id="time-23" type="checkbox" value="23:00"><label class='check_time' for="time-23" data-time="23:00">23:00 </label></li>
                                </ul>
                                <span class="message_for_hourses hidden">
                                    Нет доступного времени на выбранную дату
                                </span>
                            </div>
                            <div class="oz_services">
                                <ul class="listUslug">
                                </ul>
                                <div class="oz_btn oz_multiselect_step">Далее</div>
                            </div>
                            <div class="oz_employees">
                                <ul class="personals">
                                </ul>
                            </div>
                            <div id="timeForm">
                                <div class="oz_form_wrap">
                                    <div class="oz_zapis_info">
                                        <p>
                                            <span class="oz_spec_info">Сотрудник:
                                                <span class="data_before_buy_fullname"></span>
                                            </span>
                                            <span class="oz_datetime_info">
                                                <span class="oz_datetime_info-date">Дата:
                                                    <span class="oz_date_info data_before_buy_date"></span>
                                                </span>
                                                <span class="oz_datetime_time"> в
                                                    <span class="oz_time_info data_before_buy_time"></span>
                                                </span>
                                            </span>
                                            <span class="oz_usluga_info">Сервис: <span>
                                                    <span class="oz_nodeposit data_before_buy_service"></span>
                                                </span>
                                            </span>
                                            <span class="oz_amount_info">Итого:
                                                <span class="data_before_buy_price"></span>
                                            </span>
                                            <span class="oz_itog_mess">Оставьте Ваши контактные данные!</span>
                                        </p>
                                    </div>
                                    <form action="#" method="post" class="oz-form false" novalidate="novalidate">
                                        <div class="form_fields">
                                            <label class="label_input_name">
                                                <input type="text" name="clientName" class="input_name" ariarequired="1" placeholder="Имя" value="{{ $client_name != null ? $client_name : '' }}">
                                                <div class="star_for_name">*</div>
                                            </label>
                                            <label class="label_input_phone">
                                                <div class="react-tel-input">
                                                    <input id="oz_phone_input" class="oz_phone_input form-control" type="text" value="{{ $client_phone != null ? substr($client_phone, 1) : '' }}" placeholder="+7 (___)___-__-__">
                                                    <div class="star_for_phone">*</div>
                                                </div>
                                            </label>
                                            <label>
                                                <input type="email" name="clientEmail" size="40" class="clientEmail" placeholder="Email (объязательно при онлайн оплате)" value="{{ $client_email != null ? $client_email : '' }}">
                                            </label>
                                            <label class="field-cf_1633706216_0-0 oz_cust_checkbox">
                                                <input type="checkbox" name="cf_1633706216_0" class="dogovor_oferty" value="Согласен с условиями договора аферты">Согласен с условиями договора аферты</label>
                                            <label>Способ оплаты</label>
                                            <ul class="oz_select select_check_oplata">
                                                <li class="oz_li oz_li_sub">
                                                    <ul class="select_type_send_money">
                                                        <li class="oz_li_sub_li active not_buyed">Не выбрано</li>
                                                        <li class="oz_li_sub_li buyed">Онлайн картой</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <label class="text-center oz_submit_label">
                                                <span>
                                                    <input type="button" class="oz_submit oz_btn btn_for_zabronirovat disabled" value="Забронировать">
                                                </span>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="block_for_phone_verify">
                                <div class="block">
                                    <p class="block_title">ПОДВЕРЖДЕНИЕ ВХОДА</з>
                                    <p class="block_description">мы отправили код с SMS</p>
                                    <label>Последный 4 цифры </label>
                                    <input type="text" class="result">
                                    <p class="block_turn disabled">
                                        <i class="fa-solid fa-arrows-rotate"></i>
                                        <span>Отправить код повторно через <span class="time" data-time_value="59">0:59</span></span>
                                    </p>
                                    <p class="msg_for_client hidden">Произошла серверная ошибка,перезагрузите страницу </p>
                                    <input type="button" value="Войти" class="btn_send disabled">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('includes.vremenno')
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.js') }}"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
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
    </script>

    <script>
        document.querySelector('.calendar_last').addEventListener('click', (e) => {
            document.querySelector('#nextMonth').classList.add('hidden');
            document.querySelector('#thisMonth').classList.remove('hidden');

            e.target.closest('a').classList.add('ui-state-disabled');
            document.querySelector('.calendar_next').closest('a').classList.remove('ui-state-disabled');

            document.querySelector('.ui-datepicker-month').textContent = document.querySelector('.ui-datepicker-month').dataset.thismonth;
            document.querySelector('.ui-datepicker-year').textContent = document.querySelector('.ui-datepicker-year').dataset.thismonth;
        });
        document.querySelector('.calendar_next').addEventListener('click', (e) => {
            document.querySelector('#thisMonth').classList.add('hidden');
            document.querySelector('#nextMonth').classList.remove('hidden');

            document.querySelector('.calendar_last').closest('a').classList.remove('ui-state-disabled');
            e.target.closest('a').classList.add('ui-state-disabled');

            document.querySelector('.ui-datepicker-month').textContent = document.querySelector('.ui-datepicker-month').dataset.nextmonth;
            document.querySelector('.ui-datepicker-year').textContent = document.querySelector('.ui-datepicker-year').dataset.nextmonth;
        });
        document.querySelector('.oz_container').addEventListener('click', function(e) {
            const oz_container = document.querySelector('.oz_container');
            if (e.target.classList.contains('selectedDay')) {
                const body = {
                    date: e.target.dataset.date,
                    get: 'enable_hourses'
                };
                fetch('/getentry', {
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
                    if (data.status) {
                        oz_container.querySelector('.oz_time .message_for_hourses').classList.add('hidden');
                        oz_container.querySelector('.oz_hid_carousel').style.transform = 'translateX(-14.2857%)';
                        oz_container.querySelector('.oz_back_btn').classList.remove('fadeOutTop');
                        oz_container.querySelector('h3.stepname').textContent = 'Выберите время записи';
                        oz_container.querySelector('.oz_date').classList.remove('active');
                        oz_container.querySelector('.oz_time').classList.add('active');
                        oz_container.querySelector('.oz_time').dataset.date = e.target.dataset.date;
                        oz_container.querySelectorAll('.oz_time ul li:not(.zagday)').forEach(function(element) {
                            if (element.classList.contains('oz_not_allowed')) {
                                element.classList.add('oz_not_allowed');
                            }
                        })
                        const timerU = ['time-03', 'time-04', 'time-05', 'time-06', 'time-07', 'time-08', 'time-09', 'time-10', 'time-11'];
                        const timerD = ['time-13', 'time-14', 'time-15', 'time-16', 'time-17'];
                        const timerE = ['time-18', 'time-19', 'time-20', 'time-21', 'time-22', 'time-23'];
                        if (Object.keys(data.hourses).length > 0) {
                            document.querySelectorAll('.oz_time .list_hourses input').forEach(function(element, index) {
                                element.closest('li').classList.add('oz_not_allowed');
                            })
                            oz_container.querySelector(".oz_time .list_hourses li.timerU").classList.add('no_slots');
                            oz_container.querySelector(".oz_time .list_hourses li.timerD").classList.add('no_slots');
                            oz_container.querySelector(".oz_time .list_hourses li.timerE").classList.add('no_slots');
                            for (let el in data.hourses) {
                                oz_container.querySelector(`.oz_time .list_hourses input#${el}`).closest('li').classList.remove('oz_not_allowed');
                                if (timerU.includes(el)) {
                                    oz_container.querySelector(".oz_time .list_hourses li.timerU").classList.remove('no_slots');
                                }
                                if (timerD.includes(el)) {
                                    oz_container.querySelector(".oz_time .list_hourses li.timerD").classList.remove('no_slots');
                                }
                                if (timerE.includes(el)) {
                                    oz_container.querySelector(".oz_time .list_hourses li.timerE").classList.remove('no_slots');
                                }
                            }
                        } else {
                            oz_container.querySelector('.list_hourses').classList.add('remove');
                            oz_container.querySelector('.oz_time .message_for_hourses').classList.remove('hidden');
                        }
                    }
                })
            } else if (e.target.classList.contains('check_time')) {
                const body = {};
                body.date = this.querySelector('.oz_time').dataset.date;
                body.time = e.target.dataset.time;
                // console.log(body);
                body.get = 'services';
                fetch('/getentry', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(body)
                }).then(res => {
                    // res.text().then(data => {
                    //     console.log(data);
                    // })
                    return res.json();
                }).then(data => {
                    // console.log(data);
                    if (data.status) {
                        oz_container.querySelector('.oz_hid_carousel').style.transform = 'translateX(-28.5714%)';
                        oz_container.querySelector('h3.stepname').textContent = 'ВЫБЕРИТЕ УСЛУГУ';
                        oz_container.querySelector('.oz_time').classList.remove('active');
                        oz_container.querySelector('.oz_services').classList.add('active');
                        oz_container.querySelector('.oz_services').dataset.date = body.date;
                        oz_container.querySelector('.oz_services').dataset.time = body.time;
                        if (Object.keys(data.services).length > 0) {
                            oz_container.querySelector('.oz_services ul.listUslug').innerHTML = '';
                            for (let id in data.services) {
                                oz_container.querySelector('.oz_services ul.listUslug').insertAdjacentHTML('beforeend', `
                                <li class="usluga" data-service_id="${id}">
                                        <p class="uslname" style="min-height:53px !important">${data.services[id].title}</p>
                                        <div class="params_usl">
                                            <div class="oz_usl_time">${data.services[id].duration}<span class="oz_op">время (мин)</span></div>
                                            <div class="oz_usl_price">${data.services[id].price}<span class="oz_op">цена (руб.)</span></div>
                                        </div>
                                    </li>`);
                                // console.log(data.services[id]);
                            }
                        }
                    }
                    // console.log(data);
                })
            } else if (e.target.classList.contains('usluga') || e.target.closest('li.usluga')) {
                const body = {};
                body.date = e.target.closest('.oz_services').dataset.date;
                body.time = e.target.closest('.oz_services').dataset.time;
                body.get = 'personals';
                if (e.target.closest('li.usluga')) {
                    body.service_id = e.target.closest('li.usluga').dataset.service_id;
                } else if (e.target.classList.contains('usluga')) {
                    body.service_id = e.target.dataset.service_id;
                }
                fetch('/getentry', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(body)
                }).then(res => {
                    // res.text().then(data => {
                    //     console.log(data);
                    // })
                    return res.json();
                }).then(data => {
                    if (data.status) {
                        oz_container.querySelector('.oz_hid_carousel').style.transform = 'translateX(-42.8571%)';
                        oz_container.querySelector('h3.stepname').textContent = 'ВЫБРАТЬ СОТРУДНИКА';
                        oz_container.querySelector('.oz_services').classList.remove('active');
                        oz_container.querySelector('.oz_employees').classList.add('active');
                        oz_container.querySelector('.oz_employees').dataset.date = body.date;
                        oz_container.querySelector('.oz_employees').dataset.time = body.time;
                        oz_container.querySelector('.oz_employees').dataset.service_id = body.service_id;
                        oz_container.querySelector('.oz_employees ul.personals').innerHTML = '';
                        if (Object.keys(data.personals).length > 0) {
                            for (let id in data.personals) {
                                // console.log(data.personals[id]);
                                oz_container.querySelector('.oz_employees ul.personals').insertAdjacentHTML('beforeend', `<li id="oz_employee-${data.personals[id].id}" class="personal" data-personal_id="${data.personals[id].id}">
                                        <div class="oz_image">
                                            <div class="oz_spec_back" style="background-image: url(${data.personals[id].image});"></div>
                                            <img src="${data.personals[id].image}" alt="personal image">
                                        </div>
                                        <div class="pers-content">
                                            <p class="pname with-description">${data.personals[id].fullname}</p>
                                            <p class="special">${data.personals[id].specialities}</p><br>
                                            <div class="oz_text_cont">
                                                <div class="oz_text_cont_wrap">
                                                    <p>${data.personals[id].content}</p>
                                                </div>
                                            </div>
                                            <div class="btn_select_personal oz_select_btn oz_btn">Выбрать</div><a href="https://a-advokat.ru/personal/voloczkaya-yuliya-vladimirovna/" class="oz_btn oz_btn_link">Больше</a>
                                        </div>
                                    </li>`);
                            }
                        }
                    }
                    // console.log(data);
                });
                // console.log(body);
            } else if (e.target.classList.contains('btn_select_personal')) {
                const body = {};
                body.date = e.target.closest('.oz_employees').dataset.date;
                body.time = e.target.closest('.oz_employees').dataset.time;
                body.service_id = e.target.closest('.oz_employees').dataset.service_id;
                body.personal_id = e.target.closest('.personal').dataset.personal_id;
                body.get = 'data_before_buy';
                // console.log(body);
                fetch('/getentry', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(body)
                }).then(res => {
                    // res.text().then(data => {
                    //     console.log(data);
                    // })
                    return res.json();
                }).then(data => {
                    if (data.status) {
                        const timeForm = oz_container.querySelector('#timeForm');
                        oz_container.querySelector('.oz_hid_carousel').style.transform = 'translateX(-57.1428%)';
                        oz_container.querySelector('h3.stepname').textContent = 'КОНТАКТНАЯ ИНФОРМАЦИЯ';
                        oz_container.querySelector('.oz_employees').classList.remove('active');
                        timeForm.classList.add('active');
                        timeForm.dataset.personal_id = data.body.personal_id;
                        timeForm.dataset.date = data.body.date;
                        timeForm.dataset.time = data.body.time;
                        timeForm.dataset.service_id = data.body.service_id;
                        timeForm.querySelector('span.data_before_buy_date').innerText = data.body.day;
                        timeForm.querySelector('span.data_before_buy_fullname').innerText = data.body.fullname;
                        timeForm.querySelector('span.data_before_buy_price').innerText = data.body.price + '  руб';
                        timeForm.querySelector('span.data_before_buy_service').innerText = data.body.service;
                        timeForm.querySelector('span.data_before_buy_time').innerText = data.body.time;
                        const timeFormFunction = function() {
                            const inputNameValue = timeForm.querySelector('input.input_name').value.trim();
                            const inputPhoneValue = timeForm.querySelector('input.oz_phone_input').value.trim();
                            const clientEmail = timeForm.querySelector('input.clientEmail').value.trim();
                            const formSelectTypeBuyed = document.querySelector('.select_type_send_money li.active');
                            const dogovorOferty = timeForm.querySelector('.dogovor_oferty').checked;
                            const regex = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');
                            let typeBuyed = '';
                            if (formSelectTypeBuyed.classList.contains('not_buyed')) {
                                typeBuyed = 'not';
                            } else if (formSelectTypeBuyed.classList.contains('buyed')) {
                                typeBuyed = 'yes';
                            }
                            timeForm.dataset.client_name = inputNameValue;
                            timeForm.dataset.client_phone = inputPhoneValue.replace(/\D/g, '');
                            timeForm.dataset.type_buyed = typeBuyed;
                            timeForm.dataset.client_email = clientEmail;
                            if (inputNameValue.length >= 3 && inputPhoneValue.replace(/\D/g, '').length == 11 && dogovorOferty) {
                                if (typeBuyed == 'yes' && regex.test(clientEmail)) {
                                    timeForm.querySelector('.btn_for_zabronirovat').classList.remove('disabled');
                                    // console.log('yes');
                                } else {
                                    if (!timeForm.querySelector('.btn_for_zabronirovat').classList.contains('disabled')) {
                                        timeForm.querySelector('.btn_for_zabronirovat').classList.add('disabled');
                                    }
                                }
                                if (typeBuyed == 'not') {
                                    timeForm.querySelector('.btn_for_zabronirovat').classList.remove('disabled');
                                    // console.log('yes');
                                }
                            } else {
                                timeForm.querySelector('.btn_for_zabronirovat').classList.add('disabled');
                            }
                            // console.log(inputNameValue, inputPhoneValue.replace(/\D/g, '').length, clientEmail, typeBuyed, dogovorOferty);
                        }
                        setInterval(timeFormFunction, 500);
                        // console.log();
                    }
                    // console.log(data);
                })
                // console.log(e.target);
                // console.log(body);
            } else if (e.target.classList.contains('btn_for_zabronirovat')) {
                if (!e.target.classList.contains('disabled')) {
                    const interval_id = window.setInterval(function() {}, Number.MAX_SAFE_INTEGER);
                    for (let i = 2; i < interval_id; i++) {
                        window.clearInterval(i);
                    }
                    oz_container.querySelector('.block_for_phone_verify .block_turn').innerHTML = `
                            <i class="fa-solid fa-arrows-rotate"></i>
                           <span>Отправить код повторно <span class="time" data-time_value="59">0:59</span></span>`;
                    oz_container.querySelector('.block_for_phone_verify .block_turn').classList.add('disabled');
                    const timeForm = oz_container.querySelector('#timeForm');
                    oz_container.querySelector('.oz_hid_carousel').style.transform = 'translateX(-71.4428%)';
                    oz_container.querySelector('h3.stepname').textContent = 'ПОДВЕРЖДЕНИЕ НОМЕРА';
                    oz_container.querySelector('.block_for_phone_verify').classList.add('active');
                    timeForm.classList.remove('active');
                    const blockForVerifyPhone = oz_container.querySelector('.block_for_phone_verify');
                    blockForVerifyPhone.dataset.personal_id = timeForm.dataset.personal_id;
                    blockForVerifyPhone.dataset.date = timeForm.dataset.date;
                    blockForVerifyPhone.dataset.time = timeForm.dataset.time;
                    blockForVerifyPhone.dataset.service_id = timeForm.dataset.service_id;
                    blockForVerifyPhone.dataset.client_name = timeForm.dataset.client_name;
                    blockForVerifyPhone.dataset.client_phone = timeForm.dataset.client_phone;
                    blockForVerifyPhone.dataset.client_email = timeForm.dataset.client_email;
                    blockForVerifyPhone.dataset.type_buyed = timeForm.dataset.type_buyed;
                    const body = {};
                    body.phone = blockForVerifyPhone.dataset.client_phone;
                    body.count = 1;
                    fetch('/verification', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(body)
                    }).then(res => {
                        // res.text().then(data => {
                        //     console.log(data);
                        // })
                        return res.json();
                    }).then(data => {
                        if (data.status == false) {
                            blockForVerifyPhone.querySelector('.msg_for_client').classList.remove('hidden');
                        }
                        // console.log(data);
                    });
                    const timer = function() {
                        time_value = parseInt(oz_container.querySelector('.block_for_phone_verify .block_turn span.time').dataset.time_value);
                        if (time_value <= 0) {
                            const interval_id = window.setInterval(function() {}, Number.MAX_SAFE_INTEGER);
                            for (let i = 2; i < interval_id; i++) {
                                window.clearInterval(i);
                            }
                            // clearInterval(firstIntarval);
                            oz_container.querySelector('.block_for_phone_verify .block_turn').classList.remove('disabled');
                            oz_container.querySelector('.block_for_phone_verify .block_turn').innerHTML = `
                            <i class="fa-solid fa-arrows-rotate"></i>
                           <span>Отправить код повторно <span class="time" data-time_value=""></span></span>`;
                        } else {
                            const minute = parseInt(time_value / 60);
                            let second = time_value - (minute * 60);
                            if (second < 10) {
                                second = `0${second}`;
                            }
                            oz_container.querySelector('.block_for_phone_verify .block_turn span.time').textContent = `${minute}:${second}`;
                            time_value--;
                            oz_container.querySelector('.block_for_phone_verify .block_turn span.time').dataset.time_value = time_value;
                        }
                    }
                    setInterval(timer, 1000);
                    oz_container.querySelector('.block_for_phone_verify .block_turn').addEventListener('click', function(event) {
                        if (!this.classList.contains('disabled')) {
                            this.classList.add('disabled');
                            oz_container.querySelector('.block_for_phone_verify .block_turn').innerHTML = `
                            <i class="fa-solid fa-arrows-rotate"></i>
                           <span>Отправить код повторно <span class="time" data-time_value="59">0:59</span></span>`;
                            const interval_id = window.setInterval(function() {}, Number.MAX_SAFE_INTEGER);
                            for (let i = 2; i < interval_id; i++) {
                                window.clearInterval(i);
                            }
                            setInterval(timer, 1000);
                            fetch('/verification', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify(body)
                            }).then(res => {
                                return res.json();
                            }).then(data => {
                                if (data.status == 'false') {
                                    if (data.status == false) {
                                        blockForVerifyPhone.querySelector('.msg_for_client').classList.remove('hidden');
                                    }
                                }
                                // console.log(data);
                            });
                        }
                    })
                    oz_container.querySelector('.block_for_phone_verify input.result').addEventListener('input', function(e) {
                        if (this.value.trim().length == 4) {
                            oz_container.querySelector('.block_for_phone_verify input.btn_send').classList.remove('disabled');
                        } else {
                            oz_container.querySelector('.block_for_phone_verify input.btn_send').classList.add('disabled');
                        }
                    });
                    const endBtnForLogin = oz_container.querySelector('.block_for_phone_verify input.btn_send');
                    endBtnForLogin.addEventListener('click', function(e) {
                        if (!e.target.classList.contains('disabled')) {
                            const blockForPhoneVerify = oz_container.querySelector('.block_for_phone_verify');
                            const client_input_code_value = oz_container.querySelector('.block_for_phone_verify input.result').value.trim();
                            const body = {};
                            body.phone = blockForPhoneVerify.dataset.client_phone;
                            body.code = client_input_code_value;
                            // console.log(body);
                            fetch('/verification/check', {
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
                                if (data.status == false) {
                                    blockForVerifyPhone.querySelector('.msg_for_client').classList.remove('hidden');
                                    blockForVerifyPhone.querySelector('.msg_for_client').textContent = 'Неправилный код';
                                } else if (data.status == true) {
                                    const body = {};
                                    body.client_phone = blockForPhoneVerify.dataset.client_phone;
                                    body.client_name = blockForPhoneVerify.dataset.client_name;
                                    body.personal_id = blockForPhoneVerify.dataset.personal_id;
                                    body.date = blockForPhoneVerify.dataset.date;
                                    body.time = blockForPhoneVerify.dataset.time;
                                    body.service_id = blockForPhoneVerify.dataset.service_id;
                                    body.type_buyed = blockForPhoneVerify.dataset.type_buyed;
                                    body.client_email = blockForPhoneVerify.dataset.client_email;

                                    // console.log(body);
                                    fetch('/verification/store', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                        },
                                        body: JSON.stringify(body)
                                    }).then(res => {
                                        // res.text().then(data => {
                                        //     console.log(data);
                                        // })
                                        return res.json();
                                    }).then(data => {
                                        // console.log(data);
                                        if (data.status == true) {
                                            if (data.url == 'profile') {
                                                window.location.href = '/profile/online_entries';
                                            } else if (data.url == 'buy') {
                                                window.location.href = `/kassa/buy?service=${data.service_id}&client_entry=${data.client_entry_id}`;
                                            }
                                        }
                                    })
                                }
                            });
                        }
                    })
                }
            }
        })
        document.querySelector('.select_check_oplata').addEventListener('click', function(e) {
            if (this.classList.contains('open')) {
                this.classList.remove('open');
            } else {
                this.classList.add('open');
            }
        })

        function oz_back_btn(element) {
            const oz_container = document.querySelector('.oz_container');
            const oz_date = oz_container.querySelector('.oz_date');
            const oz_time = oz_container.querySelector('.oz_time');
            const oz_services = oz_container.querySelector('.oz_services');
            const oz_employees = oz_container.querySelector('.oz_employees');
            const timeForm = oz_container.querySelector('#timeForm');
            const blockPhoneVerify = oz_container.querySelector('.block_for_phone_verify');
            const oz_hid_carousel = oz_container.querySelector('.oz_hid_carousel');
            const stepname = oz_container.querySelector('h3.stepname');
            if (oz_time.classList.contains('active')) {
                oz_hid_carousel.style.transform = "translateX(0)";
                oz_time.classList.remove('active');
                oz_date.classList.add('active');
                oz_container.querySelector('.oz_back_btn').classList.add('fadeOutTop');
                stepname.textContent = 'Выберите дату';
                oz_time.dataset.date = '';
            } else if (oz_services.classList.contains('active')) {
                oz_hid_carousel.style.transform = "translateX(-14.2857%)";
                oz_services.classList.remove('active');
                oz_time.classList.add('active');
                stepname.textContent = 'Выберите время записи';
                oz_services.dataset.date = '';
                oz_services.dataset.time = '';
            } else if (oz_employees.classList.contains('active')) {
                oz_hid_carousel.style.transform = "translateX(-28.5714%)";
                oz_employees.classList.remove('active');
                oz_services.classList.add('active');
                stepname.textContent = 'ВЫБЕРИТЕ УСЛУГУ';
                oz_employees.dataset.date = '';
                oz_employees.dataset.time = '';
                oz_employees.dataset.service_id = '';
            } else if (timeForm.classList.contains('active')) {
                oz_hid_carousel.style.transform = "translateX(-42.8571%)";
                stepname.textContent = 'ВЫБРАТЬ СОТРУДНИКА';
                oz_employees.classList.add('active');
                timeForm.classList.remove('active');
                timeForm.dataset.personal_id = '';
                timeForm.dataset.date = '';
                timeForm.dataset.time = '';
                timeForm.dataset.service_id = '';
                timeForm.querySelector('span.data_before_buy_date').innerText = '';
                timeForm.querySelector('span.data_before_buy_fullname').innerText = '';
                timeForm.querySelector('span.data_before_buy_price').innerText = '';
                timeForm.querySelector('span.data_before_buy_service').innerText = '';
                timeForm.querySelector('span.data_before_buy_time').innerText = '';

            } else if (blockPhoneVerify.classList.contains('active')) {
                oz_hid_carousel.style.transform = "translateX(-57.1471%)";
                stepname.textContent = 'КОНТАКТНАЯ ИНФОРМАЦИЯ';
                timeForm.classList.add('active');
                blockPhoneVerify.classList.remove('active');
                const interval_id = window.setInterval(function() {}, Number.MAX_SAFE_INTEGER);
                for (let i = 2; i < interval_id; i++) {
                    window.clearInterval(i);
                }
                const timeFormFunction = function() {
                    const inputNameValue = timeForm.querySelector('input.input_name').value.trim();
                    const inputPhoneValue = timeForm.querySelector('input.oz_phone_input').value.trim();
                    const clientEmail = timeForm.querySelector('input.clientEmail').value.trim();
                    let typeBuyed = document.querySelector('.select_type_send_money .active');
                    const dogovorOferty = timeForm.querySelector('.dogovor_oferty').checked;
                    const regex = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');
                    if (typeBuyed.classList.contains('not_buyed')) {
                        typeBuyed = 'not';
                    } else if (typeBuyed.classList.contains('buyed')) {
                        typeBuyed = 'yes';
                    }
                    timeForm.dataset.client_name = inputNameValue;
                    timeForm.dataset.client_phone = inputPhoneValue.replace(/\D/g, '');
                    timeForm.dataset.type_buyed = typeBuyed;
                    timeForm.dataset.client_email = clientEmail;
                    if (inputNameValue.length >= 3 && inputPhoneValue.replace(/\D/g, '').length == 11 && dogovorOferty) {
                        if (typeBuyed == 'yes' && regex.test(clientEmail)) {
                            timeForm.querySelector('.btn_for_zabronirovat').classList.remove('disabled');
                        } else {
                            if (!timeForm.querySelector('.btn_for_zabronirovat').classList.contains('disabled')) {
                                timeForm.querySelector('.btn_for_zabronirovat').classList.add('disabled');
                            }
                        }
                        if (typeBuyed == 'not') {
                            timeForm.querySelector('.btn_for_zabronirovat').classList.remove('disabled');
                        }
                    } else {
                        timeForm.querySelector('.btn_for_zabronirovat').classList.add('disabled');
                    }
                }
                setInterval(timeFormFunction, 500);
            }
        }
        document.querySelector('.select_type_send_money').addEventListener('click', function(e) {
            this.querySelectorAll('li').forEach(function(element, index) {
                element.classList.remove('active');
            })
            e.target.classList.add('active');
        })
    </script>
</body>

</html>
