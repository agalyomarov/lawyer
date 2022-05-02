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
            <form action="{{ route('admin.service.update', $service->id) }}" method="post">
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
                    <input type="text" class="form-control" placeholder="description" name="decription" value="{{ $service->decription }}">
                </div>
                <div class=" form-group">
                    <textarea id="creare_service_summernote" name="content">{{ $service->content }}</textarea>
                </div>
                <div class="form-group col-3">
                    <label>Цена</label>
                    <input type="number" class="form-control" id="price" placeholder="Цена" name="price" value="{{ $service->price }}">
                </div>
                <div class="form-group">
                    <label>Продолжительность услуги</label>
                    <select class="form-control col-3" name="duration">
                        @for ($i = 0; $i <= 60; $i += 15)
                            <option value="{{ $i }}" {{ $i == $service->duration ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" {{ $service->publishing ? 'checked' : '' }} name="publishing">
                        <label class="form-check-label">
                            Опубликовано
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary col-2">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
