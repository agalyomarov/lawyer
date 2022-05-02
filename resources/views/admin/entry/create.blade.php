@extends('layouts.admin')
@section('content')
    <style>
        .start,
        .end {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

    </style>
    <div class="row mb-5">
        <div class="col-12 d-flex">
            <h1 class="mr-4">Добавить онлайн запис</h1>
            <a href="{{ route('admin.entry.index') }}" class="btn btn-success">Главная</a>
        </div>
        <div class="col-9 mt-3">
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
            <div class="form-group">
                <label>Интервал</label>
                <p>{{ $personal->interval }} минут</p>
            </div>
            <div class="form-group ">
                <label>Расписание</label>
                <div class="d-flex">
                    <div class="form-check">
                        <input id="tab_1" class="form-check-input" type="radio" name="tab" checked value="user">
                        <label class="form-check-label" for="tab_1">Пользовательский</label>
                    </div>
                </div>
                <div class="row bg-white mt-2">
                    <div class="col-4">
                        <div id="datepicker">
                            <button id="add-datepicker" class="btn btn-primary float-right">Добавить</button>
                        </div>
                    </div>
                    <div class="records col-8 table-responsive p-0">
                        {{-- <div class="record float-left w-100" data-interval='{{ $personal->interval }}'>
                            <div class="d-flex p-2">
                                <label class="col-form-label ml-2">Дата</label>
                                <div contentEditable class="days ml-2 form-control form-control-border" style="min-height:2rem;height:auto;color:blue;background:white;overflow:auto"></div>
                            </div>
                            <div class="d-flex p-1 float-left ">
                                <label class="col-form-label ml-2">начало</label>
                                <div class="form-group ml-2 ">
                                    <select class="form-control form-control-border p-0 start" style="width:35px;color:blue;background:white" onChange="startChange(this)">
                                        @for ($i = 0; $i < 24; $i++)
                                            @for ($j = 0; $j < 60; $j += 15)
                                                <option value="{{ $i * 60 * 60 + $j * 60 }}">{{ $i < 10 ? '0' : '' }}{{ $i }}:{{ $j }}{{ $j == 0 ? 0 : '' }}</option>
                                            @endfor
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex p-1 float-left">
                                <label class="col-form-label ml-4">конец</label>
                                <div class="form-group ml-2 ">
                                    <select class="form-control form-control-border p-0 end" style="width:35px;color:blue;background:white" onChange="endChange(this)">
                                        @for ($i = 0; $i < 24; $i++)
                                            @for ($j = 0; $j < 60; $j += 15)
                                                <option value="{{ $i * 60 * 60 + $j * 60 }}">{{ $i < 10 ? '0' : '' }}{{ $i }}:{{ $j }}{{ $j == 0 ? 0 : '' }}</option>
                                            @endfor
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="float-left ml-5">
                                <button type="button" class="btn btn-block btn-primary btn-sm mt-2 btn-add-record">Добавить</button>
                            </div>
                            <div class="float-left ml-5">
                                <button type="button" class="btn btn-block btn-danger btn-sm mt-2 btn-delete-record-block">Удалить</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-success pl-3 pr-3" value="Сохранить">
            </div>
        </div>
    </div>
    <script>
        const record_block_html = `<div class="record float-left w-100" data-interval='{{ $personal->interval }}'>
                            <div class="d-flex p-2">
                                <label class="col-form-label ml-2">Дата</label>
                                <div contentEditable class="days ml-2 form-control form-control-border" style="min-height:2rem;height:auto;color:blue;background:white;overflow:auto"></div>
                            </div>
                            <div class="d-flex p-1 float-left ">
                                <label class="col-form-label ml-2">начало</label>
                                <div class="form-group ml-2 ">
                                    <select class="form-control form-control-border p-0 start" style="width:35px;color:blue;background:white" onChange="startChange(this)">
                                        @for ($i = 0; $i < 24; $i++)
                                            @for ($j = 0; $j < 60; $j += 15)
                                                <option value="{{ $i * 60 * 60 + $j * 60 }}">{{ $i < 10 ? '0' : '' }}{{ $i }}:{{ $j }}{{ $j == 0 ? 0 : '' }}</option>
                                            @endfor
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex p-1 float-left">
                                <label class="col-form-label ml-4">конец</label>
                                <div class="form-group ml-2 ">
                                    <select class="form-control form-control-border p-0 end" style="width:35px;color:blue;background:white" onChange="endChange(this)">
                                        @for ($i = 0; $i < 24; $i++)
                                            @for ($j = 0; $j < 60; $j += 15)
                                                <option value="{{ $i * 60 * 60 + $j * 60 }}">{{ $i < 10 ? '0' : '' }}{{ $i }}:{{ $j }}{{ $j == 0 ? 0 : '' }}</option>
                                            @endfor
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="float-left ml-5">
                                <button type="button" class="btn btn-block btn-primary btn-sm mt-2 btn-add-record">Добавить</button>
                            </div>
                            <div class="float-left ml-5">
                                <button type="button" class="btn btn-block btn-danger btn-sm mt-2 btn-delete-record-block">Удалить</button>
                            </div>
                        </div>`;
        $(document).ready(() => {
            $("#datepicker").datepicker({
                closeText: 'Закрыть',
                prevText: 'Предыдущий',
                nextText: 'Следующий',
                currentText: 'Сегодня',
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
                dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
                dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
                dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                weekHeader: 'Не',
                dateFormat: 'dd.mm.yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: '',
                minDate: 0,
            });
            $("#datepicker").multiDatesPicker();
            $('#datepicker').multiDatesPicker('resetDates');
            const records = document.querySelector('.records');

            $('#add-datepicker').click((e) => {
                const record_blocks = records.querySelectorAll('.record');
                const c = record_blocks.length
                const dates = $('#datepicker').multiDatesPicker('getDates');
                $('#datepicker').multiDatesPicker('resetDates');
                if (dates.length > 0) {
                    if (record_blocks.length == 0 || record_blocks[c - 1].classList.contains('disabled')) {
                        records.insertAdjacentHTML('beforeend', record_block_html);
                        const record_blocks = records.querySelectorAll('.record');
                        const c = record_blocks.length
                        const record = record_blocks[c - 1];
                        record.querySelector('.days').innerText = dates.join('  |  ');
                        record.querySelector('.days').dataset.days = JSON.stringify(dates);
                    } else {
                        record.querySelector('.days').innerText = dates.join('  |  ');
                        record.querySelector('.days').dataset.days = JSON.stringify(dates);
                    }
                }
            });

            records.addEventListener('click', (e) => {
                if (e.target.classList.contains('btn-delete-record-block')) {
                    e.target.closest(".record").remove();
                }
                if (e.target.classList.contains('btn-add-record')) {
                    const record = e.target.closest(".record");
                    const days = record.querySelector('.days');
                    const start = record.querySelector('.start');
                    const end = record.querySelector('.end');
                    if (days.textContent != '' && parseInt(start.value) < parseInt(end.value)) {
                        record.classList.add('disabled');
                        days.setAttribute('contentEditable', 'false');
                        start.setAttribute('disabled', '');
                        end.setAttribute('disabled', '');
                        e.target.classList.add('hidden');
                    } else {
                        console.log('not');
                    }
                }
            });
        });

        const startChange = (event) => {
            const record = event.closest(".record");
            const addSecond = parseInt(event.value) + ((parseInt(record.dataset.interval) + 15) * 60);
            record.querySelector(`.end option[value='${addSecond}']`).selected = true;
        }
        const endChange = (event) => {
            const record = event.closest(".record");
            if (parseInt(record.querySelector('.start').value) >= parseInt(event.value)) {
                startChange(record.querySelector('.start'));
            }
        }
    </script>
    <style>
        table.ui-datepicker-calendar tbody td,
        table.ui-datepicker-calendar tbody td a {
            background: white !important;
            color: #0BAFB9 !important;
            border: none !important;
            font-size: 16px !important;
            font-weight: bold !important;
            text-align: center !important;
            height: 3em !important;
            line-height: 3em !important;
            border-radius: 5px !important;
        }

        table.ui-datepicker-calendar tbody td.ui-state-highlight,
        table.ui-datepicker-calendar tbody td.ui-state-highlight a,
        table.ui-datepicker-calendar tbody td.ui-state-highlight a.ui-state-active {
            background: #2DDE98 !important;
            color: white !important;
            border: none !important;
            font-size: 16px !important;
            font-weight: bold !important;
            text-align: center !important;
            height: 3em !important;
            line-height: 3em !important;
            border-radius: 5px !important;
        }

    </style>
@endsection
