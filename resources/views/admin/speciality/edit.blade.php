@extends('layouts.admin')

@section('content')
    <div class="row mb-2 ml-2">
        <div class="col-12 d-flex">
            <h1 class="mr-4">Редактировать специальности</h1>
            <a href="{{ route('admin.speciality.index') }}" class="btn btn-success">Главная</a>
        </div>
    </div>
    <div class="row mb-2 ml-2">
        <form action="{{ route('admin.speciality.update', $speciality->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="price">Название</label>
                <input type="text" class="form-control" placeholder="название" name="title" value="{{ $speciality->title }}">
            </div>
            <div class="form-group">
                <label for="price">Перевод</label>
                <input type="text" class="form-control" placeholder="название" name="translate" value="{{ $speciality->translate }}">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="publishing" {{ $speciality->publishing ? 'checked' : '' }}>
                <label class="form-check-label">Опубликовано</label>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
@endsection
