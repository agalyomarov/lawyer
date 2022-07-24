@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <div class="mr-3">
                <h1> Редактировать новости</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger col-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <img src="{{ asset($news->image) }}" alt="">
                <div class="form-group col-6">
                    <label for="exampleInputFile">Изображение</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image">
                            <label class="custom-file-label">Выберите файл</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Заголовок</label>
                    <input type="text" class="form-control col-6" placeholder="" name="title" value="{{ $news->title }}">
                </div>
                <div class="form-group">
                    <label>Краткое описание</label>
                    <input type="text" class="form-control col-6" placeholder="" name="short_description" value="{{ $news->short_description }}">
                </div>
                <div class="form-group">
                    <label>Контент</label>
                    <textarea id="summernote">
                        {!! $news->content !!}
                    </textarea>
                </div>

                <div class="form-group">
                    <label>Медиа</label>
                    <input type="text" class="form-control col-6" placeholder="" name="media" value="{{ $news->media }}">
                </div>
                <input type="hidden" name="content" value="" id="content">
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary" onclick="document.querySelector('#content').value=$('#summernote').summernote('code')">Изменить</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#summernote').summernote({
            lang: 'ru-RU',
            height: 500, // set editor height
            minHeight: 400,
            maxHeight: null,
            tabsize: 2,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                // ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
