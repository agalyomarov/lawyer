@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <div class="mr-3">
                <h1> Редактировать отзыв</h1>
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
            <form method="post" action="{{ route('admin.review.update', $review->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="form-control col-6" placeholder="" name="name" value="{{ $review->name }}">
                </div>
                <div class="form-group">
                    <label>Контент</label>
                    <textarea id="summernote">
                        {!! $review->content !!}
                    </textarea>
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
