@extends('layouts.admin')
@section('content')
    <style>
        .block_for_add_entry {
            width: 100%;
            height: auto;
        }

        .calendar {
            width: 250px;
            height: auto;
            background-color: #fff;
            padding-bottom: 3px;
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
        }

        .calendar .table .table_row .last {
            background-color: silver;
            color: rgba(0, 0, 0, 0.5)
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
                <div class="block_for_add_entry">
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
                                <div class="day">7</div>
                                <div class="day">8</div>
                                <div class="day">9</div>
                                <div class="day">10</div>
                                <div class="day">11</div>
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
                </div>
                <div class="form-group ">
                    <div class="d-flex mt-2">
                        <div class="btn_for_add_entry btn btn-success">Добавить запис</div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/aa53675e71.js" crossorigin="anonymous"></script>
        <script>
            $('.btn_for_add_entry').click(function(e) {
                console.log(e.target);
            });
        </script>
    @endsection
