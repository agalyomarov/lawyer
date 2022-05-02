@extends('layouts.admin')
@section('content')
    <style type="text/css">
        td.specialDay,
        table.ui-datepicker-calendar tbody td.specialDay a {
            background-color: #2DDE98 !important;
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
    <div class="row mb-5">
        <div class="col-12 d-flex">
            <h1 class="mr-4">Добавить услиги</h1>
            <a href="{{ route('admin.service.index') }}" class="btn btn-success">Главная</a>
        </div>
        <div class="col-9 mt-3">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('admin.service.store') }}" method="post">
                @csrf
                <img id='full' style="height:100px; width:100px;object-fit:cover;box-sizing:border-box;border:2px solid white">
                <img class="ml-5" id='output' style="height:100px; width:100px;object-fit:cover;border-radius:50%;box-sizing:border-box;border:2px solid white">
                <div class="form-group mt-3">
                    <label for="exampleInputFile">Изображение сотрудника</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input personal-avatar">
                            <label class="custom-file-label">Выбрать файл</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ф.И.О</label>
                    <input type="text" class="form-control" placeholder="Ф.И.О" name="fullname">
                </div>
                <div class="form-group">
                    <label>Для h1</label>
                    <input type="text" class="form-control" placeholder="For h1" name="h1">
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control" placeholder="description" name="decription">
                </div>
                <div class="form-group">
                    <label>Media</label>
                    <input type="text" class="form-control" placeholder="Относительный путь" name="media">
                </div>
                <div class="form-group">
                    <label>Описание</label>
                    <textarea id="creare_service_summernote" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label>Рег.номер</label>
                    <input type="text" class="form-control" placeholder="Регистрационный номер" name="regnumber">
                </div>
                <div class="form-group">
                    @if (isset($specialities) && count($specialities) > 0)
                        <label>Специальности</label>
                        @foreach ($specialities as $speciality)
                            <div class="form-check">
                                <input id="{{ $speciality->translate }}" class=" form-check-input" type="checkbox" name='speciality' value="{{ $speciality->translate }}">
                                <label class="form-check-label" for="{{ $speciality->translate }}"> {{ $speciality->title }}</label>
                            </div>
                        @endforeach
                    @else
                        <a href="{{ route('admin.speciality.index') }}" class="btn btn-info">Добавьте специальности</a>
                    @endif
                </div>
                <div class="form-group">
                    <label>Индивидуальный временной интервал в форме бронирования</label>
                    <select class="form-control col-3" name="time_intarval">
                        <option value="45">Стандартная</option>
                        @for ($i = 30; $i <= 120; $i += 30)
                            <option value="{{ $i }}">{{ $i }} минут</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked="" name="publishing">
                        <label class="form-check-label">
                            Опубликовано
                        </label>
                    </div>
                </div>
                <div class="form-group ml-3">
                    <label>Расписание</label>
                    <div class="d-flex">
                        <div class="form-check">
                            <input id="tab_1" class="form-check-input" type="radio" name="tab" checked value="user">
                            <label class="form-check-label" for="tab_1">Пользовательский</label>
                        </div>
                    </div>
                    <div class="row bg-white mt-2" style="max-height: 410px">
                        <div class="col-4">
                            <div id="datepicker">
                                <a id="add-datepicker" href="#datepicker" class="btn btn-primary float-right">Добавить</a>
                            </div>
                        </div>
                        <div class="records col-8 table-responsive p-0" style="max-height: inherit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const record_block_html = `<div class="record float-left w-100">
                                <div class="d-flex p-2">
                                    <label class="col-form-label ml-2">Дата</label>
                                    <div contentEditable class="days ml-2 form-control form-control-border" style="min-height:2rem;height:auto;color:blue;background:white;overflow:auto"></div>
                                </div>
                                <div class="d-flex p-1 float-left ">
                                    <label class="col-form-label ml-2">начало</label>
                                    <div class="form-group ml-2 ">
                                        <input type="text" class="form-control form-control-border p-0" style="width:17px;color:blue;background:white" maxlength="2" value="00">
                                    </div>
                                    <span class="ml-1" style="line-height:35px">:</span>
                                    <div class="form-group ml-1">
                                        <input type="text" class="form-control form-control-border p-0" style="width:17px;color:blue;background:white" maxlength="2" value="00">
                                    </div>
                                </div>
                                <div class="d-flex p-1 float-left">
                                    <label class="col-form-label ml-4">конец</label>
                                    <div class="form-group ml-2">
                                        <input type="text" class="form-control form-control-border p-0" style="width:17px;color:blue;background:white" maxlength="2" value="00">
                                    </div>
                                    <span class="ml-1" style="line-height:35px">:</span>
                                    <div class="form-group ml-1">
                                        <input type="text" class="form-control form-control-border p-0" style="width:17px;color:blue;background:white" maxlength="2" value="00">
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
            document.querySelector('.personal-avatar').addEventListener('change', (event) => {
                let input = event.target;
                let reader = new FileReader();
                reader.onload = function() {
                    let dataURL = reader.result;
                    let output = document.getElementById('output');
                    let full = document.getElementById('full');
                    output.src = dataURL;
                    full.src = dataURL;
                };
                reader.readAsDataURL(input.files[0]);
                document.querySelector('.custom-file-label').innerText = event.target.value;
            });
            $('#creare_service_summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            // let holidays = [
            //     [1, 1],
            //     [7, 1],
            //     [23, 2],
            //     [8, 3],
            //     [1, 5],
            //     [9, 5],
            //     [12, 6],
            //     [4, 11]
            // ];
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
                // beforeShowDay: function(date) {
                //     for (var i = 0; i < holidays.length; i++) {
                //         if (holidays[i][0] == date.getDate() && holidays[i][1] - 1 == date.getMonth()) {
                //             return [true, 'ui-state-highlight'];
                //         }
                //     }
                //     return [true];
                // },
            });
            $("#datepicker").multiDatesPicker();
            $('#datepicker').multiDatesPicker('resetDates');
            const records = document.querySelector('.records');
            $('a#add-datepicker').click((e) => {
                const record_blocks = records.querySelectorAll('.record');
                const c = record_blocks.length
                let dates = $('#datepicker').multiDatesPicker('getDates');
                $('#datepicker').multiDatesPicker('resetDates');
                if (dates.length > 0) {
                    if (record_blocks.length == 0 || record_blocks[c - 1].classList.contains('disabled')) {
                        records.insertAdjacentHTML('beforeend', record_block_html);
                        const record_blocks = records.querySelectorAll('.record');
                        const c = record_blocks.length
                        record_blocks[c - 1].querySelector('.days').innerText = dates.join('  |  ');
                    } else {
                        record_blocks[c - 1].querySelector('.days').innerText = dates.join('  |  ');
                    }
                }
            });
            records.addEventListener('click', (e) => {
                if (e.target.classList.contains('btn-delete-record-block')) {
                    e.target.closest(".record").remove();
                }
                if (e.target.classList.contains('btn-add-record')) {
                    e.target.closest(".record").classList.add('disabled');
                }
            })
        });
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
