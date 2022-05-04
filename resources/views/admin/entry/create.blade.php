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
            width: auto;
            height: auto;
            background-color: rgb(255, 127, 127);
            color: #000;
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
                <div class="text-center text-danger alert-for-personal">kljcb slkj</div>
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
                                                        <td><span class="simple_day" data-date="{{ $day['date'] }}">{{ $day['day'] }}</span></td>
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
                                                    <td><span class="simple_day" data-date="{{ $day['date'] }}">{{ $day['day'] }}</span></td>
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
                                        <select class="form-control form-control-border start p-0 text-center">
                                            @for ($i = 0; $i <= 82800; $i += 1800)
                                                <option value="{{ intval(strtotime(Date::now()->format('Y-m-d'))) + $i }}">{{ gmdate('H:i', $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">до:</label>
                                    <div class="col-6">
                                        <select class="form-control form-control-border end p-0 text-center">
                                            @for ($i = 0; $i <= 82800; $i += 1800)
                                                <option value="{{ intval(strtotime(Date::now()->format('Y-m-d'))) + $i }}">{{ gmdate('H:i', $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group text-center">
                                        <input type="button" class="save_entries_to_db btn btn-primary" value="Сохранить">
                                    </div>
                                </div>
                            </div>
                            <div class="block_for_selected_dates col-10 m-0 p-1" style="min-height: 50px;border-left:1px solid rgba(0,0,0,0.2)">
                                {{-- <p class="selected_day"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_for_entry"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_disabled"><span>11.11.2011</span><i class="fa fa-times"></i></p> --}}
                            </div>
                        </div>
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
                    // console.log(e);
                })
            }
        })

        document.querySelector('.empty_entry_block .block_for_selected_dates').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove_selected_day')) {
                document.querySelector(`.ui-datepicker-calendar span[data-date="${event.target.closest('p').dataset.date}"]`).classList.remove('selected');
                document.querySelector('.empty_entry_block .block_for_selected_dates').innerHTML = '';
                document.querySelector('.ui-datepicker-calendar').querySelectorAll('.simple_day.selected').forEach(function(element, index) {
                    const miniBlockForSelectedDate = `<p data-date="${element.dataset.date}" class="selected_day"><span>${element.dataset.date}</span><i class="remove_selected_day fa fa-times"></i></p>`;
                    document.querySelector('.empty_entry_block .block_for_selected_dates').insertAdjacentHTML('beforeend', miniBlockForSelectedDate);
                })
            }
        })
        document.querySelector('.block_start_end_time .save_entries_to_db').addEventListener('click', function(e) {
            const elementForAlert = document.querySelector('.alert-for-personal');
            if (!document.querySelectorAll('.empty_entry_block .block_for_selected_dates p').length > 0) {
                elementForAlert.innerText = 'Выберите дату';
                elementForAlert.classList.remove('hidden');
                // console.log('not');
            }
            const selected_dates = document.querySelectorAll('.empty_entry_block .block_for_selected_dates p').forEach(function(element, index) {
                // console.log(element);
            })
            // console.log(e.target);
        })
    </script>
@endsection
