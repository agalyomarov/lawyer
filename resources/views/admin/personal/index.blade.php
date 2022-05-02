@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="mr-3">
            <h1>Сотрудники</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.personal.create') }}" type="button" class="btn btn-block btn-info">
                Добавить сотрудника
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (isset($personals) && count($personals) > 0)
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ф.И.О</th>
                                    <th>ЧПУ</th>
                                    <th>Рег.номер</th>
                                    <th>Специальности</th>
                                    <th>Интервал</th>
                                    <th>Опубликовано</th>
                                    <th colspan="2">Действие</th>
                                </tr>
                            </thead>
                            <tbody class="delete-personal">
                                @foreach ($personals as $personal)
                                    <tr>
                                        <td>{{ $personal->id }}</td>
                                        <td>{{ $personal->fullname }}</td>
                                        <td>{{ $personal->chpu }}</td>
                                        <td>{{ $personal->regnumber }}</td>
                                        <td>{{ $personal->specialities }}</td>
                                        <td>{{ $personal->interval }} минут</td>
                                        <td>{{ $personal->publishing ? 'Да' : 'Нет' }}</td>
                                        <td><a href="{{ route('admin.personal.edit', $personal->id) }}"><i class="fas fa-pen"></i></a></td>
                                        <td><i class="delete-personal-el text-danger fas fa-trash" data-id="{{ $personal->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h6>Сотрудники не добавлены</h6>
            @endif
        </div>
    </div>
    <script>
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
    </script>
@endsection
