@extends('layouts.admin')
@section('content')
    <style>
        .start,
        .end {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .simple_day {
            background: white !important;
            color: #0BAFB9 !important;
            border: none !important;
            font-size: 16px !important;
            font-weight: bold !important;
            text-align: center !important;
            height: 4em !important;
            line-height: 4em !important;
            border-radius: 3px !important;
            cursor: pointer;
        }

        .simple_day.selected {
            background: #2DDE98 !important;
            color: white !important;
            border: none !important;
            border: none !important;
            font-size: 16px !important;
            font-weight: bold !important;
            text-align: center !important;
            height: 4em !important;
            line-height: 4em !important;
            border-radius: 3px !important;
            cursor: pointer;
        }

        .unselect {
            background: rgb(221, 219, 219) !important;
            color: gray !important;
            border: none !important;
            font-size: 16px !important;
            font-weight: bold !important;
            text-align: center !important;
            height: 4em !important;
            line-height: 4em !important;
            border-radius: 3px !important;
        }

        .ui-datepicker {
            width: inherit !important;
        }

        .hidden {
            display: none !important;
            visibility: hidden !important;
            z-index: -999;
        }

        .selected_day {
            display: block;
            background-color: #0BAFB9;
            width: 100px;
            height: 40px;
            line-height: 40px;
            float: left;
            display: flex;
            justify-content: space-around;
            border-radius: 3px;
            overflow: hidden;
            margin: 0 0 0 0;
            padding: 0 0 0 0;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .selected_day span {
            width: auto;
            float: left;
            font-size: 15px;
            text-align: center;
            color: white;
        }

        .selected_day i {
            font-size: 14px;
            line-height: inherit;
            text-align: center;
            padding-right: 5px;
            cursor: pointer;
            color: white;
        }

        .selected_day i:hover {
            color: #000;
            font-size: 15px;
        }

        .selected_day_disabled {
            background-color: rgb(221, 219, 219) !important;
            display: block;
            width: 100px;
            height: 40px;
            line-height: 40px;
            float: left;
            display: flex;
            justify-content: space-around;
            border-radius: 3px;
            overflow: hidden;
            margin: 0 0 0 0;
            padding: 0 0 0 0;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .selected_day_disabled span {
            color: rgba(0, 0, 0, 0.3);
            width: auto;
            float: left;
            font-size: 15px;
            text-align: center;
        }

        .selected_day_disabled i {
            color: rgba(0, 0, 0, 0.3);
            font-size: 14px;
            line-height: inherit;
            text-align: center;
            padding-right: 5px;
            cursor: pointer;
        }

        .selected_day_disabled i:hover {
            color: #000;
            font-size: 15px;
        }

        .selected_day_for_entry {
            background-color: RGB(255, 127, 80);
            display: block;
            width: 100px;
            height: 40px;
            line-height: 40px;
            float: left;
            display: flex;
            justify-content: space-around;
            border-radius: 3px;
            overflow: hidden;
            margin: 0 0 0 0;
            padding: 0 0 0 0;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .selected_day_for_entry span {
            color: #fff;
            width: auto;
            float: left;
            font-size: 15px;
            text-align: center;
        }

        .selected_day_for_entry i {
            display: none;
            visibility: hidden;
            z-index: -999;
        }

        .alert-for-personal {
            text-align: center;
        }

        .alert-for-personal span {
            padding: 10px 30px;
            background-color: rgb(244, 178, 178);
            color: rgb(109, 21, 21);
            border-radius: 3px;
        }

        .message_for_personal {
            text-align: center;
        }

        .message_for_personal span {
            padding: 3px 30px;
            background-color: rgb(53, 204, 234);
            color: #000;
            border-radius: 3px;
        }

    </style>
    <div class="row mb-5">
        <div class="col-12 d-flex">
            <h1 class="mr-4">Добавить онлайн запис</h1>
            <a href="{{ route('admin.entry.index') }}" class="btn btn-success">Главная</a>
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
                <input type="text" class="form-control bg-white" placeholder="Ф.И.О" name="fullname" value="{{ $personal->fullname }}" disabled>
            </div>
            <div class="form-group ">
                <label>Расписание</label>
                <div class="d-flex">
                    <div class="form-check">
                        <input id="tab_1" class="form-check-input" type="radio" name="tab" checked value="user">
                        <label class="form-check-label" for="tab_1">Пользовательский</label>
                    </div>
                </div>
                <div class="alert-for-personal hidden"><span></span></div>
                <div class="message_for_personal hidden"><span></span>
                </div>
                <div class="row bg-white mt-2">
                    <div id="datepicker" class="col-3">
                        <div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;">
                            <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all">
                                <a class="ui-datepicker-prev ui-corner-all ui-state-disabled" title="Предыдущий">
                                    <span class="ui-icon ui-icon-circle-triangle-w"></span>
                                </a>
                                <a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Следующий">
                                    <span class="ui-icon ui-icon-circle-triangle-e"></span>
                                </a>
                                <div class="ui-datepicker-title" id="title-this-month">
                                    <span class="ui-datepicker-month">{{ $thisMonth['name'] }}</span>
                                    &nbsp;
                                    <span class="ui-datepicker-year">{{ $thisMonth['year'] }}</span>
                                </div>
                                <div class="ui-datepicker-title hidden" id="title-next-month">
                                    <span class="ui-datepicker-month">{{ $nextMonth['name'] }}</span>
                                    &nbsp;
                                    <span class="ui-datepicker-year">{{ $nextMonth['year'] }}</span>
                                </div>
                            </div>
                            <table class="ui-datepicker-calendar">
                                <thead>
                                    <tr>
                                        <th scope="col"><span title="понедельник">Пн</span></th>
                                        <th scope="col"><span title="вторник">Вт</span></th>
                                        <th scope="col"><span title="среда">Ср</span></th>
                                        <th scope="col"><span title="четверг">Чт</span></th>
                                        <th scope="col"><span title="пятница">Пт</span></th>
                                        <th scope="col" class="ui-datepicker-week-end"><span title="суббота">Сб</span></th>
                                        <th scope="col" class="ui-datepicker-week-end"><span title="воскресенье">Вс</span></th>
                                    </tr>
                                </thead>
                                <tbody id="thisMonth" class="">
                                    @foreach ($thisMonth['weeks'] as $week)
                                        <tr>
                                            @foreach ($week as $day)
                                                @if ($day['view'])
                                                    @if ($day['enable'])
                                                        @if ($day['saved'])
                                                            <td><span class="simple_day selected" data-date="{{ $day['date'] }}">{{ $day['day'] }}</span></td>
                                                        @else
                                                            <td><span class="simple_day" data-date="{{ $day['date'] }}">{{ $day['day'] }}</span></td>
                                                        @endif
                                                    @else
                                                        <td><span class="unselect">{{ $day['day'] }}</span></td>
                                                    @endif
                                                @else
                                                    <td></td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="nextMonth" class="hidden">
                                    @foreach ($nextMonth['weeks'] as $week)
                                        <tr>
                                            @foreach ($week as $day)
                                                @if ($day['view'])
                                                    @if ($day['enable'])
                                                        @if ($day['saved'])
                                                            <td><span class="simple_day selected" data-date="{{ $day['date'] }}">{{ $day['day'] }}</span></td>
                                                        @else
                                                            <td><span class="simple_day" data-date="{{ $day['date'] }}">{{ $day['day'] }}</span></td>
                                                        @endif
                                                    @else
                                                        <td><span class="unselect">{{ $day['day'] }}</span></td>
                                                    @endif
                                                @else
                                                    <td></td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="entry_blocks col-9  p-2 pr-3">
                        <div class="empty_entry_block row mb-2" style="border: 1px solid rgba(0,0,0,0.2);height:auto;border-radius:3px">
                            <div class="block_start_end_time col-2">
                                <div class="row mb-2">
                                    <label class="col-3 col-form-label">от:</label>
                                    <div class="col-6">
                                        <select class="form-control form-control-border start p-0 text-center" style="background-color: #E9ECEF;border-radius:3px">
                                            @for ($i = 0; $i <= 82800; $i += 1800)
                                                <option value="{{ $i }}">{{ gmdate('H:i', $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">до:</label>
                                    <div class="col-6">
                                        <select class="form-control form-control-border end p-0 text-center" style="background-color: #E9ECEF;border-radius:3px">
                                            @for ($i = 0; $i <= 82800; $i += 1800)
                                                <option value="{{ $i }}">{{ gmdate('H:i', $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group text-center">
                                        <input onClick="save_entries_to_db(this)" type="button" class="save_entries_to_db btn btn-primary" data-personal_id={{ $personal->id }} value="Сохранить">
                                    </div>
                                </div>
                            </div>
                            <div class="block_for_selected_dates col-10 m-0 p-1" style="min-height: 50px;border-left:1px solid rgba(0,0,0,0.2)">
                                {{-- <p class="selected_day"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_for_entry"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_disabled"><span>11.11.2011</span><i class="fa fa-times"></i></p> --}}
                            </div>
                        </div>
                        @if ($allEntriesOfPersonal)
                            @foreach ($allEntriesOfPersonal as $block_count => $block)
                                <div class="saved_entry_block row mb-2" style="border: 1px solid rgba(0,0,0,0.2);height:auto;border-radius:3px" data-block_count='{{ $block_count }}' data-personal_id="{{ $personal->id }}">
                                    <div class="block_start_end_time_for_saved col-2">
                                        <div class="row mb-2">
                                            <label class="col-3 col-form-label">от:</label>
                                            <div class="col-6">
                                                <select disabled class="form-control form-control-border start p-0 text-center" style="background-color: #E9ECEF;border-radius:3px">
                                                    @for ($i = 0; $i <= 82800; $i += 1800)
                                                        <option value="{{ $i }}" @if ($block['block_start_time'] == $i) selected @endif>{{ gmdate('H:i', $i) }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-3 col-form-label">до:</label>
                                            <div class="col-6">
                                                <select disabled class="form-control form-control-border end p-0 text-center" style="background-color: #E9ECEF;border-radius:3px">
                                                    @for ($i = 0; $i <= 82800; $i += 1800)
                                                        <option value="{{ $i }} " @if ($block['block_end_time'] == $i) selected @endif>{{ gmdate('H:i', $i) }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group text-center">
                                                <input type="button" class="update_saved_entries_on_db btn btn-primary" data-personal_id={{ $personal->id }} value="Сохранить">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block_for_selected_dates col-10 m-0 p-1" style="min-height: 50px;border-left:1px solid rgba(0,0,0,0.2)">
                                        @foreach ($block['dates'] as $key => $date)
                                            @if ($date['disabled'])
                                                <p data-date='{{ $date['date'] }}' class="selected_day_disabled"><span>{{ $date['date'] }}</span><i class="remove_saved_day fa fa-times"></i></p>
                                            @elseif(!$date['enable'])
                                                <p data-date='{{ $date['date'] }}' class="selected_day_for_entry"><span>{{ $date['date'] }}</span><i class=" fa fa-times"></i></p>
                                            @else
                                                <p data-date='{{ $date['date'] }}' class="selected_day"><span>{{ $date['date'] }}</span><i class="remove_saved_day fa fa-times"></i></p>
                                            @endif
                                        @endforeach
                                        {{-- <p class="selected_day"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_for_entry"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_disabled"><span>11.11.2011</span><i class="fa fa-times"></i></p> --}}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.ui-datepicker-prev').addEventListener('click', (e) => {
            document.querySelector('tbody#nextMonth').classList.add('hidden');
            document.querySelector('tbody#thisMonth').classList.remove('hidden');
            e.target.classList.add('ui-state-disabled');
            document.querySelector('.ui-datepicker-next').classList.remove('ui-state-disabled');
            document.querySelector('#title-this-month').classList.remove('hidden');
            document.querySelector('#title-next-month').classList.add('hidden');
        })
        document.querySelector('.ui-datepicker-next').addEventListener('click', (e) => {
            document.querySelector('tbody#thisMonth').classList.add('hidden');
            document.querySelector('tbody#nextMonth').classList.remove('hidden');
            e.target.classList.add('ui-state-disabled');
            document.querySelector('.ui-datepicker-prev').classList.remove('ui-state-disabled');
            document.querySelector('#title-this-month').classList.add('hidden');
            document.querySelector('#title-next-month').classList.remove('hidden');
        });
        document.querySelector('.ui-datepicker-calendar').addEventListener('click', function(e) {
            document.querySelector('.alert-for-personal').classList.add('hidden');
            if (e.target.classList.contains('simple_day')) {
                if (e.target.classList.contains('selected')) {
                    e.target.classList.remove('selected');
                } else {
                    e.target.classList.add('selected');
                }
                document.querySelector('.empty_entry_block .block_for_selected_dates').innerHTML = '';
                this.querySelectorAll('.simple_day.selected').forEach(function(element, index) {
                    const miniBlockForSelectedDate = `<p data-date="${element.dataset.date}" class="selected_day"><span>${element.dataset.date}</span><i class="remove_selected_day fa fa-times"></i></p>`;
                    document.querySelector('.empty_entry_block .block_for_selected_dates').insertAdjacentHTML('beforeend', miniBlockForSelectedDate);
                })
            }
        })

        document.querySelector('.empty_entry_block .block_for_selected_dates').addEventListener('click', function(event) {
            document.querySelector('.alert-for-personal').classList.add('hidden');
            if (event.target.classList.contains('remove_selected_day')) {
                document.querySelector(`.ui-datepicker-calendar span[data-date="${event.target.closest('p').dataset.date}"]`).classList.remove('selected');
                document.querySelector('.empty_entry_block .block_for_selected_dates').innerHTML = '';
                document.querySelector('.ui-datepicker-calendar').querySelectorAll('.simple_day.selected').forEach(function(element, index) {
                    const miniBlockForSelectedDate = `<p data-date="${element.dataset.date}" class="selected_day"><span>${element.dataset.date}</span><i class="remove_selected_day fa fa-times"></i></p>`;
                    document.querySelector('.empty_entry_block .block_for_selected_dates').insertAdjacentHTML('beforeend', miniBlockForSelectedDate);
                })
            }
        });

        function save_entries_to_db(e) {
            const elementForAlert = document.querySelector('.alert-for-personal span');
            if (document.querySelectorAll('.empty_entry_block .block_for_selected_dates p').length == 0) {
                elementForAlert.innerText = 'Выберите дату';
                elementForAlert.closest('div').classList.remove('hidden');
            } else if (parseInt(document.querySelector('.block_start_end_time select.start').value) + 1800 >= document.querySelector('.block_start_end_time select.end').value) {
                elementForAlert.innerText = 'Премежутечний время менше один час';
                elementForAlert.closest('div').classList.remove('hidden');
            } else {
                elementForAlert.closest('div').classList.add('hidden');
                const body = {
                    dates: []
                };
                const selected_dates = document.querySelectorAll('.empty_entry_block .block_for_selected_dates p').forEach(function(element, index) {
                    body['dates'].push(element.dataset.date);
                })
                body['start_time'] = document.querySelector('.block_start_end_time select.start').value;
                body['end_time'] = document.querySelector('.block_start_end_time select.end').value;

                fetch(`/admin/entry/store/${e.dataset.personal_id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(body)
                }).then(data => {
                    return data.json();
                }).then(res => {
                    if (res.status == true) {
                        e.closest('.block_start_end_time').classList.add('block_start_end_time_for_saved');
                        e.closest('.block_start_end_time').querySelector('select.start').setAttribute('disabled', true);
                        e.closest('.block_start_end_time').querySelector('select.end').setAttribute('disabled', true);
                        e.closest('.block_start_end_time').classList.remove('block_start_end_time');
                        e.closest('.empty_entry_block').classList.add('saved_entry_block');
                        e.closest('.empty_entry_block').classList.remove('empty_entry_block');
                        e.closest('.saved_entry_block').querySelectorAll('.block_for_selected_dates p i').forEach(function(element, index) {
                            element.classList.remove('remove_selected_day');
                            element.classList.add('remove_saved_day');
                        });
                        e.closest('.saved_entry_block').setAttribute('data-personal_id', res.personal_id);
                        e.closest('.saved_entry_block').setAttribute('data-block_count', res.block_count);
                        e.closest('div').insertAdjacentHTML('afterbegin', '<input type="button" class="update_saved_entries_on_db btn btn-primary" data-personal_id={{ $personal->id }} value="Сохранить">');
                        e.remove();
                        document.querySelector('.entry_blocks').insertAdjacentHTML('afterbegin', `<div class="empty_entry_block row mb-2" style="border: 1px solid rgba(0,0,0,0.2);height:auto;border-radius:3px">
                            <div class="block_start_end_time col-2">
                                <div class="row mb-2">
                                    <label class="col-3 col-form-label">от:</label>
                                    <div class="col-6">
                                        <select  class="form-control form-control-border start p-0 text-center"  style="background-color: #E9ECEF;border-radius:3px">
                                            @for ($i = 0; $i <= 82800; $i += 1800)
                                                <option value="{{ $i }}">{{ gmdate('H:i', $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">до:</label>
                                    <div class="col-6">
                                        <select  class="form-control form-control-border end p-0 text-center"  style="background-color: #E9ECEF;border-radius:3px">
                                            @for ($i = 0; $i <= 82800; $i += 1800)
                                                <option value="{{ $i }}">{{ gmdate('H:i', $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group text-center">
                                        <input onClick="save_entries_to_db(this)" type="button" class="save_entries_to_db btn btn-primary" data-personal_id={{ $personal->id }} value="Сохранить">
                                    </div>
                                </div>
                            </div>
                            <div class="block_for_selected_dates col-10 m-0 p-1" style="min-height: 50px;border-left:1px solid rgba(0,0,0,0.2)">
                                {{-- <p class="selected_day"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_for_entry"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_disabled"><span>11.11.2011</span><i class="fa fa-times"></i></p> --}}
                            </div>
                        </div>`);
                    } else if (res.status == 'dublicate') {
                        document.querySelector('.alert-for-personal span').innerText = `Данный не записывался в БД.Повторяется дубликат записей для  дата ${res.message[0]} ${res.message[1]}-${res.message[2]}`;
                        document.querySelector('.alert-for-personal').classList.remove('hidden');
                    } else {
                        document.querySelector('.alert-for-personal span').innerText = res.message;
                        document.querySelector('.alert-for-personal').classList.remove('hidden');
                    }
                })
            }
        };

        document.querySelector('.entry_blocks').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove_saved_day')) {
                e.target.closest('p').remove();
            }
            if (e.target.classList.contains('update_saved_entries_on_db')) {
                const body = {
                    dates: []
                };
                body['personal_id'] = e.target.closest('.saved_entry_block ').dataset.personal_id;
                body['block_count'] = e.target.closest('.saved_entry_block ').dataset.block_count;
                const saved_entry_block = e.target.closest('.saved_entry_block');
                if (saved_entry_block.querySelectorAll('.block_for_selected_dates p').length > 0) {
                    saved_entry_block.querySelectorAll('.block_for_selected_dates p').forEach(function(element, index) {
                        body.dates.push(element.dataset.date);
                    });
                }
                fetch(`/admin/entry/${body.personal_id}`, {
                    method: 'put',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(body)
                }).then(data => {
                    return data.json();
                }).then(res => {
                    if (res.status) {
                        if (body.dates.length == 0) {
                            saved_entry_block.remove();
                        }
                    } else {
                        document.querySelector('.alert-for-personal span').innerText = res.message;
                        document.querySelector('.alert-for-personal').classList.remove('hidden');
                    }
                })
            }
        })
    </script>
@endsection
