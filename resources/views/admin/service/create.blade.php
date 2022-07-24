@extends('layouts.admin')

@section('content')
    <div class="row">
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
            <form action="{{ route('admin.service.store') }}" method="post" id="form">
                @csrf
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" placeholder="Заголовок" name="title">
                </div>
                <div class="form-group">
                    <label>Для h1</label>
                    <input type="text" class="form-control" name="h1" placeholder="For h1">
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control" name="description" placeholder="description">
                </div>
                <input type="hidden" name="content" id="content">
                <div class="form-group">
                    <label>Описание</label>
                    <textarea id="creare_service_summernote"></textarea>
                </div>
                <div class="form-group col-3">
                    <label>Цена</label>
                    <input type="number" class="form-control" id="price" placeholder="Цена" name="price">
                </div>
                <div class="form-group">
                    <label>Длительность услуги</label>
                    <select class="form-control col-3" name="duration">
                        @for ($i = 0; $i <= 60; $i += 15)
                            <option value="{{ $i }}" {{ $i == 45 ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-primary col-2" onClick="getSummernoteConttent()">Добавить</button>
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
