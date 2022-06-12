@extends('layouts.admin')
@section('content')
    <style>
        * {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .block_for_add_entry {
            width: 100%;
            height: auto;
        }

        .calendar {
            width: 250px;
            height: auto;
            background-color: #fff;
            padding-bottom: 3px;
            float: left;
        }

        .calendar .calendar_header {
            width: 100%;
            height: 40px;
            /* border-bottom: 1px solid #000; */
            line-height: 40px;
        }

        .calendar .calendar_header .prev_month {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: silver;
            text-align: center;
            line-height: 20px;
            border-radius: 50%;
            float: left;
            margin-left: 5px;
            margin-top: 10px
        }

        .calendar .calendar_header .next_month {
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: silver;
            text-align: center;
            line-height: 20px;
            border-radius: 50%;
            margin-right: 5px;
            float: right;
            margin-top: 10px
        }

        .calendar .calendar_header .month {
            display: inline-block;
            width: 140px;
            /* background-color: yellow; */
            text-align: center
        }

        .calendar .calendar_header .year {
            display: inline-block;
            width: 50px;
            /* background-color: silver; */
            text-align: center
        }

        .calendar .table .table_row {
            display: flex;
            width: 100%;
            height: 35px;
            /* background: silver; */
            line-height: 35px;
            margin-top: 3px;
        }

        .calendar .table .table_row .week,
        .calendar .table .table_row .day {
            width: 13.28%;
            height: 35px;
            text-align: center;
            line-height: 35px;
            margin: 0px 0.5%;
        }

        .calendar .table .table_row .day {
            /* border: 1px solid red; */
            border-radius: 5px;
            margin: 3px 0.5%;
            font-size: 16px;
            cursor: pointer;
        }

        .calendar .table .table_row .last {
            background-color: silver;
            color: rgba(0, 0, 0, 0.5)
        }

        .calendar .table .table_row .click {
            background-color: rgb(28, 157, 249);
            color: #fff;
        }

        .calendar .table .table_row .entry {
            background-color: rgb(72, 127, 163);
            color: #fff;
        }

        .calendar .table .table_row .online_entry {
            background-color: rgb(17, 0, 255);
            color: #fff;
        }

        .calendar .table .table_row .entryBuyed {
            background-color: rgb(255, 185, 55);
            color: #fff;
        }


        .added_entries {
            float: right;
            width: calc(100% - 260px);
            min-height: 290px;
            background-color: #fff;
            margin-left: 10px;
            padding-bottom: 10px;
        }

        .added_entries .entry_day {
            position: relative;
            width: 80px;
            height: 30px;
            background-color: rgb(28, 157, 249);
            /* padding-left: 5px; */
            text-align: center;
            border-radius: 5px;
            color: #fff;
            float: left;
            margin-left: 13px;
            margin-top: 13px;
        }

        .added_entries .entry_day.saved {
            background-color: rgb(72, 127, 163);
            color: #fff;
        }

        .added_entries .entry_day.last {
            background-color: silver;
            color: rgba(0, 0, 0, 0.5)
        }

        .added_entries .entry_day.disable {
            background-color: rgb(17, 0, 255);
            color: #fff;
        }

        .added_entries .entry_day.buyed {
            background-color: orange;
            color: #fff;
        }


        .added_entries .entry_day span {
            line-height: 30px;
        }

        .added_entries .entry_day i {
            position: absolute;
            width: 15px;
            height: 15px;
            background-color: silver;
            top: -7.5px;
            right: -7.5px;
            line-height: 15px;
            text-align: center;
            border-radius: 50px;
            color: #fff
        }

        .add_time_for_entry {
            width: 250px;
            height: 50px;
            float: left;
            background-color: #fff;
            line-height: 50px;
            text-align: center;
            margin-top: 10px;
            clear: both;
        }

        .add_time_for_entry select {
            width: 60px;
            border-radius: 5px;
            text-align: center;
            height: 30px;
            line-height: 30px;
            margin: 0 5px;
        }

        .btn_for_add {
            float: left;
            clear: left;
            margin-top: 10px;
        }

        .block_for_saved_entries {
            width: 100%;
            height: auto;
            /* background-color: #fff; */
            float: left;
            margin-top: 50px;
        }

        .block_for_saved_entries .saved_entry_block {
            width: calc(100% - 260px);
            height: auto;
            float: right;
            background-color: #fff;
            padding-bottom: 10px;
            margin-bottom: 20px;

        }

        .saved_entry_block .entry_day {
            width: 80px;
            height: 30px;
            background-color: rgb(72, 127, 163);
            text-align: center;
            border-radius: 5px;
            color: #fff;
            float: left;
            margin-left: 10px;
            margin-top: 10px;
            line-height: 30px;
            cursor: pointer;
        }

        .saved_entry_block .entry_day.last {
            background-color: silver;
            color: rgba(0, 0, 0, 0.5) cursor: pointer;
        }

        .saved_entry_block .entry_day.buyed.disable {
            background-color: orange;
            color: #fff;
            cursor: pointer;

        }

        .saved_entry_block .entry_day.disable {
            background-color: rgb(17, 0, 255);
            color: #fff;
            cursor: pointer;
        }

        .saved_entry_block .control {
            width: 270px;
            height: 30px;
            background-color: #fff;
            float: left;
            padding: 10px 0 0 10px;
            margin-right: 20px;
        }

        .saved_entry_block .control select {
            width: 60px;
            border-radius: 5px;
            text-align: center;
            height: 30px;
            line-height: 30px;
            margin: 0 5px;
        }

        .saved_entry_block .control .btn_for_edit {
            width: 90px;
            height: 30px;
            float: right;
            background-color: #28a745;
            color: white;
            text-align: center;
            border-radius: 5px;
            line-height: 27px;
            cursor: pointer;
        }

        .saved_entry_block .btn_for_delete_block {
            position: relative;
            width: 80px;
            height: 30px;
            background-color: red;
            /* padding-left: 5px; */
            text-align: center;
            border-radius: 5px;
            color: #fff;
            float: right;
            margin-right: 13px;
            margin-top: 13px;
            cursor: pointer;
        }

        .message_for_admin {
            position: fixed;
            width: auto;
            height: 40px;
            background-color: rgb(88, 90, 156);
            color: #fff;
            bottom: 40px;
            right: 40px;
            padding: 0 30px;
            border-radius: 3px;
            line-height: 40px;
            overflow: hidden;
        }

        .message_for_admin i {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #fff;
            color: #000;
            width: 15px;
            height: 15px;
            text-align: center;
            line-height: 15px;
            border-radius: 3px;
            border: 1px solid silver;
        }

        .empty_entry_day,
        .not_buyed_entry_day,
        .buyed_entry_day {
            width: 100%;
            height: 30px;
            line-height: 30px;
            padding-left: 50px;
            position: relative;
        }

        .empty_entry_day div,
        .not_buyed_entry_day div,
        .buyed_entry_day div {
            position: absolute;
            top: 5px;
            left: 20px;
            min-width: 20px;
            min-height: 20px;
            /* background-color: #000; */
            z-index: 2;
            border-radius: 50%;
        }

        .empty_entry_day div {
            background-color: rgb(72, 127, 163);
        }

        .not_buyed_entry_day div {
            background-color: rgb(17, 0, 255);
        }

        .buyed_entry_day div {
            background-color: rgb(255, 185, 55);
        }

        .bg_black {
            position: fixed;
            min-width: 100vw;
            min-height: 100vh;
            z-index: 1;
            background-color: #000;
            opacity: 0.4;
            top: 0;
            left: 0;
        }

        .list_entries_of_day {
            position: fixed;
            width: 500px;
            height: 800px;
            background: #fff;
            top: calc(50% - 400px);
            left: calc(50% - 250px);
            z-index: 3;
            padding: 20px;
            border-radius: 5px;
        }

        .list_entries_of_day .block {
            border-bottom: 1px solid silver;
            float: left;
            margin: 5px 0;
            width: 100%;
        }

        .list_entries_of_day .block .list {
            display: inline-block;
            float: left;
        }

        .list_entries_of_day .block .info {
            background-color: rgb(14, 160, 238);
            float: right;
            color: white;
            padding: 3px 6px;
            border-radius: 5px;
            cursor: pointer;
        }

        .block_for_info {
            position: fixed;
            width: 500px;
            height: 650px;
            top: calc(50% - 325px);
            left: calc(50% - 250px);
            background-color: #fff;
            z-index: 3;
            border-radius: 5px;
        }

        .block_for_info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-left: calc(50% - 50px);
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .block_for_info .fio_porsonal,
        .block_for_info .service_title,
        .block_for_info .service_price,
        .block_for_info .time,
        .block_for_info .status,
        .block_for_info .link {
            text-align: center;
            margin-top: 5px;
            font-size: 17px;
            display: block;
            width: 100%;
        }
    </style>
    <div class="block_for_info hidden">
        {{-- <img src="{{ asset('image/3KuZOxYLSJ8yQ0ZfYYfN3nh0jCta2TkWHAYvowOB.jpg') }}" alt="">
        <div class="fio_porsonal">Волоцкая Юлия Владимировна</div>
        <a href="" class="service_title">Консультация по административному праву</a>
        <div class="service_price">Цена : 2000</div>
        <div class="time">Дата и время : 12.12.2022 14:00</div>
        <div class="status">Статус : Оплачен</div>
        <a href="#" class="link">Ссылка</a>
        <div class="status" style="margin-top:30px">Данный клиента :</div>
        <div class="fio_porsonal">Волоцкая Юлия Владимировна</div>
        <div class="fio_porsonal">+79871874976</div>
        <div class="fio_porsonal">omaraly971215@gmail.com</div>

        <div class="link disable" style="color:red;cursor:pointer">Отменить</div> --}}

    </div>
    <div class="row mb-5">
        <div class="col-12 d-flex">
            <h1 class="mr-4">Добавить онлайн запис</h1>
            <a href="{{ route('admin.entry.index') }}" class="btn btn-success">Главная</a>
        </div>
        <div class="empty_entry_day">
            <div></div> - Дни которыми нет не одного записа
        </div>
        <div class="not_buyed_entry_day">
            <div></div>- Дни которыми есть не оплаченный записи
        </div>
        <div class="buyed_entry_day">
            <div></div>- Дни которыми есть оплаченный записи
        </div>
        <div class="col-12 mt-3">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group">
                <label>Ф.И.О</label>
                <input type="text" class="form-control bg-white w-50 fullName" placeholder="Ф.И.О" name="fullname" value="{{ $personal->fullname }}" disabled data-personal_id={{ $personal->id }}>
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-success add_entry_first_btn" value="Добавить запис">
            </div>
            <div class="form-group">
                <div class="block_for_add_entry hidden">
                    <div class="calendar calendar_this">
                        <div class="calendar_header">
                            {{-- <i class="prev_month fa-solid fa-angle-left"></i> --}}
                            <span class="month">{{ $thisMonth->monthName }}</span>
                            <span class="year">{{ $thisMonth->year }}</span>
                            <i class="next_month fa-solid fa-angle-right"></i>
                        </div>
                        <div class="table">
                            <div class="table_row" style="background:silver">
                                <div class="week">пн</div>
                                <div class="week">вт</div>
                                <div class="week">ср</div>
                                <div class="week">чт</div>
                                <div class="week">пт</div>
                                <div class="week">сб</div>
                                <div class="week">вс</div>
                            </div>
                            @foreach ($thisMonth->week as $week)
                                <div class="table_row">
                                    @foreach ($week as $day)
                                        @if (isset($day['simpleDay']))
                                            <div class="day @if (isset($day['isLastDate'])) last @endif" data-currentdate="{{ $day['currentDate'] }}">
                                                {{ $day['currentDay'] }}
                                            </div>
                                        @else
                                            <div class="day empty"></div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                            {{-- <div class="table_row">
                                <div class="day"></div>
                                <div class="day online_entry"></div>
                                <div class="day last">1</div>
                                <div class="day last">2</div>
                                <div class="day entry">3</div>
                                <div class="day click">4</div>
                                <div class="day click">5</div>
                                <div class="day online_entry">5</div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="calendar calendar_next hidden">
                        <div class="calendar_header">
                            <i class="prev_month fa-solid fa-angle-left"></i>
                            <span class="month">{{ $nextMonth->monthName }}</span>
                            <span class="year">{{ $nextMonth->year }}</span>
                            {{-- <i class="next_month fa-solid fa-angle-right"></i> --}}
                        </div>
                        <div class="table">
                            <div class="table_row" style="background:silver">
                                <div class="week">пн</div>
                                <div class="week">вт</div>
                                <div class="week">ср</div>
                                <div class="week">чт</div>
                                <div class="week">пт</div>
                                <div class="week">сб</div>
                                <div class="week">вс</div>
                            </div>
                            @foreach ($nextMonth->week as $week)
                                <div class="table_row">
                                    @foreach ($week as $day)
                                        @if (isset($day['simpleDay']))
                                            <div class="day" data-currentdate="{{ $day['currentDate'] }}">
                                                {{ $day['currentDay'] }}
                                            </div>
                                        @else
                                            <div class="day empty"></div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="added_entries">
                    </div>
                    <div class="add_time_for_entry">
                        <select name="block_start_time" class="blockStartTime">
                            @for ($i = 0; $i <= 82800; $i += 1800)
                                <option value="{{ $i }}">{{ gmdate('H:i', $i) }}</option>
                            @endfor
                        </select>
                        <span>–</span>
                        <select name="block_end_time" id="" class="blockEndTime">
                            @for ($i = 0; $i <= 82800; $i += 1800)
                                <option value="{{ $i }}">{{ gmdate('H:i', $i) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="btn_for_add">
                        <button class="btn btn-success saveAddedOrEditedEntry" data-action="save">Добавить</button>
                        <button class="btn btn-danger hiddenBlockForAddEntry">Отменить</button>
                    </div>
                </div>
                @isset($blocks)
                    @if (count($blocks) > 0)
                        <div class="block_for_saved_entries">
                            <div class="calendar calendar_this">
                                <div class="calendar_header">
                                    {{-- <i class="prev_month fa-solid fa-angle-left"></i> --}}
                                    <span class="month">{{ $thisMonth->monthName }}</span>
                                    <span class="year">{{ $thisMonth->year }}</span>
                                    <i class="next_month fa-solid fa-angle-right"></i>
                                </div>
                                <div class="table">
                                    <div class="table_row" style="background:silver">
                                        <div class="week">пн</div>
                                        <div class="week">вт</div>
                                        <div class="week">ср</div>
                                        <div class="week">чт</div>
                                        <div class="week">пт</div>
                                        <div class="week">сб</div>
                                        <div class="week">вс</div>
                                    </div>
                                    @foreach ($thisMonth->week as $week)
                                        <div class="table_row">
                                            @foreach ($week as $day)
                                                @if (isset($day['simpleDay']))
                                                    <div class="day @if (isset($day['isLastDate'])) last @endif  @if (isset($day['entryDay'])) entry @endif @if (isset($day['disableDay'])) online_entry @endif  @if (isset($day['entryBuyed'])) entryBuyed @endif"
                                                        data-currentdate="{{ $day['currentDate'] }}">
                                                        {{ $day['currentDay'] }}
                                                    </div>
                                                @else
                                                    <div class="day empty"></div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="calendar calendar_next hidden">
                                <div class="calendar_header">
                                    <i class="prev_month fa-solid fa-angle-left"></i>
                                    <span class="month">{{ $nextMonth->monthName }}</span>
                                    <span class="year">{{ $nextMonth->year }}</span>
                                    {{-- <i class="next_month fa-solid fa-angle-right"></i> --}}
                                </div>
                                <div class="table">
                                    <div class="table_row" style="background:silver">
                                        <div class="week">пн</div>
                                        <div class="week">вт</div>
                                        <div class="week">ср</div>
                                        <div class="week">чт</div>
                                        <div class="week">пт</div>
                                        <div class="week">сб</div>
                                        <div class="week">вс</div>
                                    </div>
                                    @foreach ($nextMonth->week as $week)
                                        <div class="table_row">
                                            @foreach ($week as $day)
                                                @if (isset($day['simpleDay']))
                                                    <div class="day @if (isset($day['entryDay'])) entry @endif  @if (isset($day['disableDay'])) online_entry @endif  @if (isset($day['entryBuyed'])) entryBuyed @endif" data-currentdate="{{ $day['currentDate'] }}">
                                                        {{ $day['currentDay'] }}
                                                    </div>
                                                @else
                                                    <div class="day empty"></div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @foreach ($blocks as $key => $block)
                                <div class="saved_entry_block" data-block_count="{{ $key }}" data-personal_id={{ $personal->id }}>
                                    <div class="control">
                                        <select disabled class="start">
                                            <option value="{{ $block['blockStartTime'] }}">{{ gmdate('H:i', $block['blockStartTime']) }}</option>
                                        </select>
                                        <span>–</span>
                                        <select disabled class="end">
                                            <option value="{{ $block['blockEndTime'] }}">{{ gmdate('H:i', $block['blockEndTime']) }}</option>
                                        </select>
                                        <div class="btn_for_edit">Изменить</div>
                                    </div>
                                    @foreach ($block['entryDates'] as $index => $date)
                                        <div class="entry_day @if (isset($date['enable'])) disable @endif @if (isset($date['buyed'])) buyed @endif">{{ date('d.m.Y', $index) }}</div>
                                    @endforeach
                                    <div class="btn_for_delete_block">Удалить</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endisset
            </div>
        </div>
    </div>
    <div class="message_for_admin hidden"><span></span><i class="fa-solid fa-xmark"></i></div>
    <div class="bg_black hidden"></div>
    <div class="list_entries_of_day hidden">
        {{-- <div class="block">
            <div class="list">09:00 - не оплаченный запис</div>
            <div class="info">Информация</div>
        </div> --}}

        {{-- <div class="list">10:00 - оплаченный запис</div>
        <div class="list">11:00 - </div>
        <div class="list">12:00 - оплаченный запис</div>
        <div class="list">08:00 - </div>
        <div class="list">09:00 - не оплаченный запис</div>
        <div class="list">10:00 - оплаченный запис</div>
        <div class="list">11:00 - </div>
        <div class="list">12:00 - оплаченный запис</div>
        <div class="list">08:00 - </div>
        <div class="list">09:00 - не оплаченный запис</div>
        <div class="list">10:00 - оплаченный запис</div>
        <div class="list">11:00 - </div>
        <div class="list">12:00 - оплаченный запис</div> --}}
    </div>
    <script>
        const messageForAdmin = document.querySelector('.message_for_admin');
        const blockForAddEntry = document.querySelector('.block_for_add_entry');
        const calendarThisMonthBlockAddEntry = blockForAddEntry.querySelector('.calendar');
        const calendarNextMonthBlockAddEntry = blockForAddEntry.querySelector('.calendar_next');
        const fisrtBtn = document.querySelector('.add_entry_first_btn');
        const btnViewNextMonthBlockAddEntry = blockForAddEntry.querySelector('.calendar .next_month');
        const btnViewPrevMonthBlockAddEntry = blockForAddEntry.querySelector('.calendar_next .prev_month');
        const blockForSavedEntries = document.querySelector('.block_for_saved_entries');
        messageForAdmin.querySelector('i').addEventListener('click', function(e) {
            messageForAdmin.classList.add('hidden');
            messageForAdmin.querySelector('span').textContent = '';
        })
        if (blockForSavedEntries) {
            const btnViewNextMonthBlockSavedEntry = blockForSavedEntries.querySelector('.calendar .next_month');
            const btnViewPrevMonthBlockSavedEntry = blockForSavedEntries.querySelector('.calendar_next .prev_month');
            const calendarThisMonthBlockSavedEntry = blockForSavedEntries.querySelector('.calendar');
            const calendarNextMonthBlockSavedEntry = blockForSavedEntries.querySelector('.calendar_next')
            btnViewNextMonthBlockSavedEntry.addEventListener('click', function() {
                calendarThisMonthBlockSavedEntry.classList.add('hidden');
                calendarNextMonthBlockSavedEntry.classList.remove('hidden');
            })
            btnViewPrevMonthBlockSavedEntry.addEventListener('click', function() {
                calendarThisMonthBlockSavedEntry.classList.remove('hidden');
                calendarNextMonthBlockSavedEntry.classList.add('hidden');
            })

        }


        fisrtBtn.addEventListener('click', function(event) {
            this.closest('.form-group').classList.add('hidden');
            blockForAddEntry.classList.remove('hidden');
        });
        btnViewNextMonthBlockAddEntry.addEventListener('click', function() {
            calendarThisMonthBlockAddEntry.classList.add('hidden');
            calendarNextMonthBlockAddEntry.classList.remove('hidden');
        })
        btnViewPrevMonthBlockAddEntry.addEventListener('click', function() {
            calendarThisMonthBlockAddEntry.classList.remove('hidden');
            calendarNextMonthBlockAddEntry.classList.add('hidden');
        })

        blockForAddEntry.addEventListener('click', function(event) {
            if (event.target.classList.contains('day') && !event.target.classList.contains('empty') && !event.target.classList.contains('last') && !event.target.classList.contains('entry')) {
                if (!event.target.classList.contains('entry') && !event.target.classList.contains('online_entry') && !event.target.classList.contains('last_online_entry')) {
                    event.target.classList.toggle('click');
                }
                this.querySelector('.added_entries').querySelectorAll('.entry_day').forEach(function(element) {
                    if (!element.classList.contains('disable') && !element.classList.contains('last') && !element.classList.contains('saved')) {
                        element.remove();
                    }
                })
                this.querySelectorAll('.day.click').forEach(function(e) {
                    blockForAddEntry.querySelector('.added_entries').insertAdjacentHTML('beforeend', `<div class="entry_day"><span>${e.dataset.currentdate}</span><i class="delete_add_date fa-solid fa-xmark"></i></div>`);
                })

            } else if (event.target.classList.contains('delete_add_date')) {
                const currentDate = event.target.closest('div.entry_day').querySelector('span').textContent;
                this.querySelector(`div.day[data-currentdate="${currentDate}"]`).classList.remove('click');
                this.querySelector(`div.day[data-currentdate="${currentDate}"]`).classList.remove('entry');
                event.target.closest('div.entry_day').remove();
            } else if (event.target.classList.contains('hiddenBlockForAddEntry')) {
                this.querySelector('.saveAddedOrEditedEntry').dataset.action = 'save';
                this.querySelector('.saveAddedOrEditedEntry').textContent = 'Добавить';
                this.querySelector('.added_entries').querySelectorAll('.entry_day').forEach(function(element) {
                    element.remove();
                });
                this.querySelectorAll('.day.click').forEach(function(e) {
                    e.classList.remove('click');
                });
                this.querySelector('.add_time_for_entry .blockStartTime').value = 0;
                this.querySelector('.add_time_for_entry .blockEndTime').value = 0;
                this.classList.add('hidden');
                this.querySelectorAll('div.day').forEach(function(element) {
                    if (element.classList.contains('last')) {
                        element.className = 'day last';
                    } else {
                        element.className = 'day';
                    }

                });
                fisrtBtn.closest('.form-group').classList.remove('hidden');
            } else if (event.target.classList.contains('saveAddedOrEditedEntry')) {
                if (event.target.dataset.action == 'save') {
                    const body = {};
                    body.selectedDates = {};
                    body.blockStartTime = this.querySelector('.add_time_for_entry .blockStartTime').value;
                    body.blockEndTime = this.querySelector('.add_time_for_entry .blockEndTime').value;
                    body.personalId = document.querySelector('.fullName').dataset.personal_id;
                    this.querySelector('.added_entries').querySelectorAll('.entry_day').forEach(function(element, index) {
                        body.selectedDates[index] = element.querySelector('span').textContent;
                    })
                    fetch(`/admin/entry/store/${body.personalId}`, {
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
                        if (data.status == true) {
                            window.location.reload();
                        } else if (data.status == 'validate') {
                            messageForAdmin.querySelector('span').textContent = data.message;
                            messageForAdmin.classList.remove('hidden');
                        } else {
                            window.location.reload();
                        }
                        // console.log(data);
                    })
                } else if (event.target.dataset.action == 'update') {
                    const body = {};
                    body.selectedDates = {};
                    body.blockStartTime = this.querySelector('.add_time_for_entry .blockStartTime').value;
                    body.blockEndTime = this.querySelector('.add_time_for_entry .blockEndTime').value;
                    body.personalId = document.querySelector('.fullName').dataset.personal_id;
                    body.blockCount = this.dataset.block_count;
                    this.querySelector('.added_entries').querySelectorAll('.entry_day').forEach(function(element, index) {
                        body.selectedDates[index] = element.querySelector('span').textContent;
                    })
                    fetch(`/admin/entry/update/${body.personalId}`, {
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
                        if (data.status == true) {
                            window.location.reload();
                        } else if (data.status == 'validate') {
                            messageForAdmin.querySelector('span').textContent = data.message;
                            messageForAdmin.classList.remove('hidden');
                        } else {
                            window.location.reload();
                        }
                    })
                    // console.log(body);
                }
            }
        });
        if (blockForSavedEntries) {
            blockForSavedEntries.addEventListener('click', function(event) {
                if (event.target.classList.contains('btn_for_delete_block')) {
                    const check = confirm('Вы точно хотите удалить все записи в блоке?');
                    if (check) {
                        const body = {};
                        body.blockCount = event.target.closest('.saved_entry_block').dataset.block_count;
                        body.personalId = event.target.closest('.saved_entry_block').dataset.personal_id;
                        fetch(`/admin/entry/delete/${body.personalId}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify(body)
                        }).then(res => {
                            // res.text().then(data => console.log(data));
                            return res.json();
                        }).then(data => {
                            if (data.status == true) {
                                window.location.reload();
                            } else if (data.status == 'validate') {
                                messageForAdmin.querySelector('span').textContent = data.message;
                                messageForAdmin.classList.remove('hidden');
                            } else {
                                window.location.reload();
                            }
                        })
                    }
                }
                if (event.target.classList.contains('btn_for_edit')) {
                    blockForAddEntry.querySelector('.hiddenBlockForAddEntry').click();
                    const savedBlock = event.target.closest('.saved_entry_block');
                    blockForAddEntry.dataset.block_count = savedBlock.dataset.block_count;
                    blockForAddEntry.querySelector('.saveAddedOrEditedEntry').dataset.action = 'update';
                    blockForAddEntry.querySelector('.saveAddedOrEditedEntry').textContent = 'Изменить';
                    blockForAddEntry.querySelector('.add_time_for_entry select.blockStartTime').value = savedBlock.querySelector('select.start').value;
                    blockForAddEntry.querySelector('.add_time_for_entry select.blockEndTime').value = savedBlock.querySelector('select.end').value;
                    savedBlock.querySelectorAll('.entry_day').forEach(function(element, index) {
                        let classesForBlock = '';
                        let classesForCalendar = 'entry';
                        let tagIEnable = true;
                        if (element.classList.contains('buyed')) {
                            classesForBlock = 'buyed';
                            classesForCalendar = 'entryBuyed';
                            tagIEnable = false;
                        } else if (element.classList.contains('disable')) {
                            classesForBlock = 'disable';
                            classesForCalendar = 'online_entry';
                            tagIEnable = false;
                        }
                        if (tagIEnable) {
                            blockForAddEntry.querySelector('.added_entries').insertAdjacentHTML('beforeend', `<div class="entry_day saved ${classesForBlock}"><span>${element.textContent}</span><i class="delete_add_date fa-solid fa-xmark"></i></div>`);
                        } else {
                            blockForAddEntry.querySelector('.added_entries').insertAdjacentHTML('beforeend', `<div class="entry_day ${classesForBlock}"><span>${element.textContent}</span></div>`);
                        }
                        blockForAddEntry.querySelector(`.calendar div.day[data-currentdate="${element.textContent}"]`).classList.add(classesForCalendar);
                    })
                    fisrtBtn.click();
                }
            });
        }
        const bgBlack = document.querySelector('.bg_black');
        const listHourses = document.querySelector('.list_entries_of_day');
        const block_for_info = document.querySelector('.block_for_info');
        bgBlack.addEventListener('click', function(e) {
            listHourses.classList.add('hidden');
            this.classList.add('hidden');
            block_for_info.classList.add('hidden');
        })
        if (blockForSavedEntries) {
            blockForSavedEntries.addEventListener('click', function(e) {
                if (e.target.classList.contains('entry_day')) {
                    //if (e.target.classList.contains('disable') || e.target.classList.contains('buyed')) {
                    const body = {};
                    body.personal_id = e.target.closest('.saved_entry_block').dataset.personal_id;
                    body.date = e.target.textContent;
                    body.block_count = e.target.closest('.saved_entry_block').dataset.block_count;
                    // console.log(body);
                    fetch(`/admin/entry/get_all_hourses/${body.personal_id}`, {
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
                        // console.log(data);
                        listHourses.innerHTML = '';
                        for (let index in data) {
                            let content = '';
                            if (data[index]['client_entry_id']) {
                                content = `
                            <div class="block">
                                    <div class="list">${index} - ${data[index]['status']}</div>
                                    <div class="info full"
                                     data-client_entry_id="${data[index]['client_entry_id']}" 
                                     data-personal_image="${data[index]['personal']['image']}"
                                     data-personal_fio="${data[index]['personal']['fullname']}"
                                     data-service_title="${data[index]['service']['title']}"
                                     data-service_price="${data[index]['service']['price']}"
                                     data-entry_start_time="${data[index]['entry_start_time']}"
                                     data-buyed="${data[index]['buyed']==true ? 'Оплачен' : data[index]['buyed']==false ? 'Не оплачен' : ''}"
                                     data-disable="${data[index]['disable']}"
                                     data-link="${data[index]['link']}"
                                     data-client_fullname="${data[index]['client']['name']}"
                                     data-client_email="${data[index]['client']['email']}"
                                     data-client_phone="${data[index]['client']['phone']}"
                                     >Информация</div>
                            </div>
                            `;
                            } else {
                                content = `
                            <div class="block">
                                    <div class="list">${index} - ${data[index]['status']}</div>
                            </div>
                            `;
                            }

                            listHourses.insertAdjacentHTML('beforeEnd', content);
                            // console.log(data[index]);
                        }
                        listHourses.classList.remove('hidden');
                        bgBlack.classList.remove('hidden');
                    })
                    // console.log(body);
                    //}
                }
            })
        }
        listHourses.addEventListener('click', function(event) {
            if (event.target.classList.contains('full')) {
                const content = `
                  <img src="/${event.target.dataset.personal_image}" alt="#">
                  <div class="fio_porsonal">${event.target.dataset.personal_fio}</div>
                  <a href="" class="service_title">${event.target.dataset.service_title}</a>
                  <div class="service_price">Цена : ${event.target.dataset.service_price}</div>
                  <div class="time">Дата и время : ${event.target.dataset.entry_start_time}</div>
                  <div class="status">Статус : ${event.target.dataset.buyed}</div>
                  <a href="${event.target.dataset.link}" class="link">Ссылка</a>
                  <div class="status" style="margin-top:30px">Данный клиента :</div>
                  <div class="fio_porsonal">${event.target.dataset.client_fullname}</div>
                  <div class="fio_porsonal">+${event.target.dataset.client_phone}</div>
                  <div class="fio_porsonal">${event.target.dataset.client_email}</div>
                  <div class="link disable ${event.target.dataset.disable=='false' ? 'hidden' : ''} " style="color:red;cursor:pointer" data-client_entry_id="${event.target.dataset.client_entry_id}">Отменить</div>
                `;
                block_for_info.innerHTML = content;
                this.classList.add('hidden');
                block_for_info.classList.remove('hidden');
            }
        })
        block_for_info.addEventListener('click', function(event) {
            if (event.target.classList.contains('disable')) {
                const check = confirm('Вы точно хотите отменить запис?');
                if (confirm) {
                    const body = {};
                    body.client_entry_id = event.target.dataset.client_entry_id;
                    // console.log(body);
                    fetch(`/admin/entry/disable_entry`, {
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
                        // console.log(data);
                    })
                    // console.log(event.target);
                }
            }
        })
    </script>
    <script src="https://kit.fontawesome.com/aa53675e71.js" crossorigin="anonymous"></script>
@endsection
