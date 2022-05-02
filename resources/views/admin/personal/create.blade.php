@extends('layouts.admin')
@section('content')
    <div class="row mb-5">
        <div class="col-12 d-flex">
            <h1 class="mr-4">Добавить cотрутника</h1>
            <a href="{{ route('admin.personal.index') }}" class="btn btn-success">Главная</a>
        </div>
        <div class="col-9 mt-3">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('admin.personal.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <img id='full' style="height:100px; width:100px;object-fit:cover;box-sizing:border-box;border:2px solid white">
                <img class="ml-5" id='output' style="height:100px; width:100px;object-fit:cover;border-radius:50%;box-sizing:border-box;border:2px solid white">
                <div class="form-group mt-3">
                    <label for="exampleInputFile">Изображение сотрудника</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input personal-avatar" name="image">
                            <label class="custom-file-label">Выбрать файл</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ф.И.О</label>
                    <input type="text" class="form-control" placeholder="Ф.И.О" name="fullname" value="{{ old('fullname') }}">
                </div>
                <div class="form-group">
                    <label>Для h1</label>
                    <input type="text" class="form-control" placeholder="For h1" name="h1" value="{{ old('h1') }}">
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control" placeholder="description" name="description" value="{{ old('description') }}">
                </div>
                <div class="form-group">
                    <label>Media</label>
                    <input type="text" class="form-control" placeholder="Относительный путь" name="media" value="{{ old('media') }}">
                </div>
                <div class="form-group">
                    <label>Описание</label>
                    <textarea id="creare_service_summernote" name="content">
                        {{ old('content') }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Рег.номер</label>
                    <input type="text" class="form-control" placeholder="Регистрационный номер" name="regnumber" value="{{ old('regnumber') }}">
                </div>
                <div class="form-group">
                    @if (isset($specialities) && count($specialities) > 0)
                        <label>Специальности</label>
                        @foreach ($specialities as $speciality)
                            <div class="form-check">
                                <input id="{{ $speciality->id }}" class=" form-check-input" type="checkbox" name='speciality[]' value="{{ $speciality->id }}">
                                <label class="form-check-label" for="{{ $speciality->id }}"> {{ $speciality->title }}</label>
                            </div>
                        @endforeach
                    @else
                        <a href="{{ route('admin.speciality.index') }}" class="btn btn-info">Добавьте специальности</a>
                    @endif
                </div>
                <div class="form-group">
                    <label>Индивидуальный временной интервал в форме бронирования</label>
                    <select class="form-control col-3" name="interval">
                        @for ($i = 30; $i <= 120; $i += 15)
                            <option {{ $i == 45 ? 'selected' : '' }} value="{{ $i }}">{{ $i }} минут</option>
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
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Добавить">
                </div>
            </form>
        </div>
    </div>
    <script>
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
    </script>
@endsection
