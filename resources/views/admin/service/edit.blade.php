@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 d-flex">
            <h1 class="mr-4">Редактировать услигу</h1>
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
            <form action="{{ route('admin.service.update', $service->id) }}" method="post" id="form">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Название</label>
                    <input type="textphp" class="form-control" placeholder="Заголовок" name="title" value="{{ $service->title }}">
                </div>
                <div class="form-group">
                    <label>ЧПУ</label>
                    <input type="text" class="form-control" placeholder="чпу" name="chpu" value="{{ $service->chpu }}">
                </div>
                <div class="form-group">
                    <label>Для h1</label>
                    <input type="text" class="form-control" placeholder="For h1" name="h1" value="{{ $service->h1 }}">
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control" placeholder="description" name="description" value="{{ $service->description }}">
                </div>
                <input type="hidden" name="content" id="content">
                <div class="form-group">
                    <textarea id="creare_service_summernote">{{ $service->content }}</textarea>
                </div>
                <div class="form-group col-3">
                    <label>Цена</label>
                    <input type="number" class="form-control" id="price" placeholder="Цена" name="price" value="{{ $service->price }}">
                </div>
                <div class="form-group">
                    <label>Длительност услуги</label>
                    <select class="form-control col-3" name="duration">
                        @for ($i = 0; $i <= 60; $i += 15)
                            <option value="{{ $i }}" {{ $i == $service->duration ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-primary col-2" onClick="getSummernoteConttent()">Изменить</button>
                </div>
            </form>
        </div>
    </div>
    <script>
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

        function getSummernoteConttent() {
            document.querySelector('#content').value = $('#creare_service_summernote').summernote('code');
            document.querySelector('#form').submit();
        }
    </script>
@endsection
