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
            background-color: rgb(45, 109, 152);
            color: #fff;
        }

        .calendar .table .table_row .online_entry {
            background-color: orange;
            color: #fff;
        }

        .calendar .table .table_row .last_online_entry {
            background-color: rgb(167, 109, 2);
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
            background-color: rgb(28, 157, 249);
            text-align: center;
            border-radius: 5px;
            color: #fff;
            float: left;
            margin-left: 10px;
            margin-top: 10px;
            line-height: 30px;
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
            background-color: red;
            color: white;
            text-align: center;
            border-radius: 5px;
            line-height: 27px;
            cursor: pointer;
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
                <input type="text" class="form-control bg-white w-50" placeholder="Ф.И.О" name="fullname" value="{{ $personal->fullname }}" disabled>
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
                        {{-- <div class="entry_day">
                            <span>10.05.2022</span>
                            <i class="fa-solid fa-xmark"></i>
                        </div> --}}
                    </div>
                    <div class="add_time_for_entry">
                        <select name="block_start_time" class="blockStartTime">
                            <option value="">00:00</option>
                            <option value="">00:30</option>
                            <option value="">01:00</option>
                            <option value="">01:00</option>
                            <option value="">01:00</option>
                        </select>
                        <span>–</span>
                        <select name="block_end_time" id="" class="blockEndTime">
                            <option value="">00:00</option>
                            <option value="">00:30</option>
                            <option value="">01:00</option>
                            <option value="">01:00</option>
                            <option value="">01:00</option>
                        </select>
                    </div>
                    <div class="btn_for_add">
                        <button class="btn btn-success save">Добавить</button>
                        <button class="btn btn-danger hiddenBlockForAddEntry">Отменить</button>
                    </div>
                </div>
                <div class="block_for_saved_entries hidden">
                    <div class="calendar">
                        <div class="calendar_header">
                            <i class="prev_month fa-solid fa-angle-left"></i>
                            <span class="month">Май</span>
                            <span class="year">2022</span>
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
                            <div class="table_row">
                                <div class="day"></div>
                                <div class="day"></div>
                                <div class="day last">1</div>
                                <div class="day last">2</div>
                                <div class="day">3</div>
                                <div class="day">4</div>
                                <div class="day">5</div>
                            </div>
                            <div class="table_row">
                                <div class="day">6</div>
                                <div class="day entry">7</div>
                                <div class="day entry">8</div>
                                <div class="day entry">9</div>
                                <div class="day online_entry">10</div>
                                <div class="day online_entry">11</div>
                                <div class="day">12</div>
                            </div>
                            <div class="table_row">
                                <div class="day">13</div>
                                <div class="day">14</div>
                                <div class="day">15</div>
                                <div class="day">16</div>
                                <div class="day">17</div>
                                <div class="day">18</div>
                                <div class="day">19</div>
                            </div>
                            <div class="table_row">
                                <div class="day">20</div>
                                <div class="day">21</div>
                                <div class="day">22</div>
                                <div class="day">23</div>
                                <div class="day">24</div>
                                <div class="day">25</div>
                                <div class="day">26</div>
                            </div>
                            <div class="table_row">
                                <div class="day">27</div>
                                <div class="day">28</div>
                                <div class="day">29</div>
                                <div class="day">30</div>
                                <div class="day"></div>
                                <div class="day"></div>
                                <div class="day"></div>
                            </div>
                        </div>
                    </div>
                    <div class="saved_entry_block">
                        <div class="control">
                            <select disabled name="" id="" class="start">
                                <option value="">00:00</option>
                            </select>
                            <span>–</span>
                            <select disabled name="" id="" class="start">
                                <option value="">00:00</option>
                            </select>
                            <div class="btn_for_edit">Изменить</div>
                        </div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                    </div>
                    <div class="saved_entry_block">
                        <div class="control">
                            <select disabled name="" id="" class="start">
                                <option value="">00:00</option>
                            </select>
                            <span>–</span>
                            <select disabled name="" id="" class="start">
                                <option value="">00:00</option>
                            </select>
                            <div class="btn_for_edit">Изменить</div>
                        </div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                    </div>
                    <div class="saved_entry_block">
                        <div class="control">
                            <select disabled name="" id="" class="start">
                                <option value="">00:00</option>
                            </select>
                            <span>–</span>
                            <select disabled name="" id="" class="start">
                                <option value="">00:00</option>
                            </select>
                            <div class="btn_for_edit">Изменить</div>
                        </div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                    </div>
                    <div class="saved_entry_block">
                        <div class="control">
                            <select disabled name="" id="" class="start">
                                <option value="">00:00</option>
                            </select>
                            <span>–</span>
                            <select disabled name="" id="" class="start">
                                <option value="">00:00</option>
                            </select>
                            <div class="btn_for_edit">Изменить</div>
                        </div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                        <div class="entry_day">10.05.2022</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/aa53675e71.js" crossorigin="anonymous"></script>
    <script>
        const calendarThisMonth = document.querySelector('.calendar');
        const calendarNextMonth = document.querySelector('.calendar_next');
        const fisrtBtn = document.querySelector('.add_entry_first_btn');
        const blockForAddEntry = document.querySelector('.block_for_add_entry');
        const btnViewNextMonth = document.querySelector('.calendar .next_month');
        const btnViewPrevMonth = document.querySelector('.calendar_next .prev_month');
        fisrtBtn.addEventListener('click', function(event) {
            this.closest('.form-group').classList.add('hidden');
            blockForAddEntry.classList.remove('hidden');
        });
        btnViewNextMonth.addEventListener('click', function() {
            calendarThisMonth.classList.add('hidden');
            calendarNextMonth.classList.remove('hidden');
        })
        btnViewPrevMonth.addEventListener('click', function() {
            calendarThisMonth.classList.remove('hidden');
            calendarNextMonth.classList.add('hidden');
        })
        blockForAddEntry.addEventListener('click', function(event) {
            if (event.target.classList.contains('day') && !event.target.classList.contains('empty') && !event.target.classList.contains('last')) {
                event.target.classList.toggle('click');
                this.querySelector('.added_entries').querySelectorAll('.entry_day').forEach(function(element) {
                    element.remove();
                })
                this.querySelectorAll('.day.click').forEach(function(e) {
                    blockForAddEntry.querySelector('.added_entries').insertAdjacentHTML('beforeend', `<div class="entry_day"><span>${e.dataset.currentdate}</span><i class="delete_add_date fa-solid fa-xmark"></i></div>`);
                })

            } else if (event.target.classList.contains('delete_add_date')) {
                const currentDate = event.target.closest('div.entry_day').querySelector('span').textContent;
                this.querySelector(`div.day[data-currentdate="${currentDate}"]`).classList.remove('click');
                event.target.closest('div.entry_day').remove();
            }
        })
    </script>
@endsection
