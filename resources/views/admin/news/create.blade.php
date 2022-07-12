@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <div class="mr-3">
                <h1> Добавить новости</h1>
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
            <form method="post" action="{{ route('admin.news.store') }}">
                @csrf
                <div class="form-group">
                    <label>Заголовок</label>
                    <input type="text" class="form-control col-6" placeholder="" name="title">
                </div>
                <div class="form-group">
                    <label>Короткий описание</label>
                    <input type="text" class="form-control col-6" placeholder="" name="short_description">
                </div>
                <div class="form-group">
                    <label>Контент</label>
                    <textarea name="content" id="summernote">

                    </textarea>
                </div>
                <div class="form-group">
                    <label>Медиа</label>
                    <input type="text" class="form-control col-6" placeholder="" name="media">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="publish">
                    <label class="form-check-label">Опубликовано</label>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Добавить</button>
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
    {{-- <script>
        if (document.querySelector('.delete-personal')) {
            document.querySelector('.delete-personal').addEventListener('click', (e) => {
                if (e.target.classList.contains('delete-personal-el')) {
                    const check = confirm('Удалить сотрудника?');
                    if (check) {
                        window.location = `/admin/personal/${e.target.dataset.id}/delete`;
                    }
                }
            });
        };
    </script> --}}
@endsection
