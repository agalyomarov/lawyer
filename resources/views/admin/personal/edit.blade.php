@extends('layouts.admin')
@section('content')
    <div class="row mb-5">
        <div class="col-12 d-flex">
            <h1 class="mr-4">Редактировать cотрутника</h1>
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
            <form action="{{ route('admin.personal.update', $personal->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <img src="{{ asset($personal->image) }}" id='full' style="height:100px; width:100px;object-fit:cover;box-sizing:border-box;border:2px solid white">
                <img src="{{ asset($personal->image) }}" class="ml-5" id='output' style="height:100px; width:100px;object-fit:cover;border-radius:50%;box-sizing:border-box;border:2px solid white">
                <div class="form-group mt-3">
                    <label for="exampleInputFile">Изображение сотрудника</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input personal-avatar" name="image">
                            <label class="custom-file-label">{{ $personal->image }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ф.И.О</label>
                    <input type="text" class="form-control" placeholder="Ф.И.О" name="fullname" value="{{ old('fullname', $personal->fullname) }}">
                </div>
                <div class="form-group">
                    <label>ЧПУ</label>
                    <input type="text" class="form-control" placeholder="ЧПУ" name="chpu" value="{{ old('chpu', $personal->chpu) }}">
                </div>
                <div class="form-group">
                    <label>Для h1</label>
                    <input type="text" class="form-control" placeholder="For h1" name="h1" value="{{ old('h1', $personal->h1) }}">
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control" placeholder="description" name="description" value="{{ old('description', $personal->description) }}">
                </div>
                <video width="100%" height="auto" controls>
                    <source src="{{ $personal->media }}#t=1" type="video/mp4">
                </video>
                <div class="form-group">
                    <label>Media</label>
                    <input type="text" class="form-control" placeholder="Относительный путь" name="media" value="{{ old('media', $personal->media) }}">
                </div>
                <div class="form-group">
                    <label>Краткое описание сотрудника</label>
                    <input type="text" class="form-control" placeholder="Краткое описание сотрудника" name="shurt_description" value="{{ old('shurt_description', $personal->shurt_description) }}">
                </div>
                <div class="form-group">
                    <label>Контент</label>
                    <textarea id="creare_service_summernote" name="content">
                        {{ old('content', $personal->content) }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Регистрационный номер</label>
                    <input type="text" class="form-control" placeholder="Регистрационный номер" name="regnumber" value="{{ old('regnumber', $personal->regnumber) }}">
                </div>
                <div class="form-group">
                    @if (isset($specialities) && count($specialities) > 0)
                        <label>Специальности</label>
                        @foreach ($specialities as $speciality)
                            <div class="form-check">
                                <input id="{{ $speciality->id }}" class=" form-check-input" type="checkbox" name='specialities[]' value="{{ $speciality->id }}" @foreach ($personal->specialities as $value) {{ $value->id == $speciality->id ? 'checked' : '' }} @endforeach>
                                <label class="form-check-label" for="{{ $speciality->id }}"> {{ $speciality->title }}</label>
                            </div>
                        @endforeach
                    @else
                        <a href="{{ route('admin.speciality.index') }}" class="btn btn-info">Добавьте специальности</a>
                    @endif
                </div>
                <div class="form-group">
                    @if (isset($services) && count($services) > 0)
                        <label>Услуги</label>
                        @foreach ($services as $service)
                            <div class="form-check">
                                <input id="{{ $service->id }}service" class=" form-check-input" type="checkbox" name='services[]' value="{{ $service->id }}" @foreach ($personal->services as $value) {{ $value->id == $service->id ? 'checked' : '' }} @endforeach>
                                <label class="form-check-label" for="{{ $service->id }}service"> {{ $service->title }}</label>
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
                            <option {{ $personal->interval == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }} минут</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="publishing" {{ $personal->publishing ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Опубликовано
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Логин</label>
                    <input type="text" class="form-control" placeholder="Логин" name="login" value="{{ old('login', $personal->login) }}">
                </div>
                <input type="hidden" name="id" value="{{ $personal->id }}">
                <div class="form-group">
                    <label>Парол</label>
                    <input type="text" class="form-control" placeholder="Парол" name="password" value="{{ old('password', $personal->password) }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Изменить">
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
            ],
        });
    </script>
@endsection
