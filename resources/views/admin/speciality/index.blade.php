@extends('layouts.admin')

@section('content')
    <div class="row mb-2 ml-2">
        <div class="col-12">
            <h1 class="m-0"> Специальности</h1>
        </div>
    </div>
    <div class="row mb-2 ml-2">
        <form action="{{ route('admin.speciality.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="price">Название</label>
                <input type="text" class="form-control" placeholder="название" name="title">
            </div>
            <div class="form-group">
                <label for="price">Перевод</label>
                <input type="text" class="form-control" placeholder="на английском" name="translate">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="publishing" checked>
                <label class="form-check-label">Опубликовано</label>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-7">
            @if (isset($specialities) && count($specialities) > 0)
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Перевод</th>
                                    <th>Опубликовано</th>
                                    <th colspan="2">Действие</th>
                                </tr>
                            </thead>
                            <tbody class="delete-speciality">
                                @foreach ($specialities as $speciality)
                                    <tr>
                                        <td>{{ $speciality->id }}</td>
                                        <td>{{ $speciality->title }}</td>
                                        <td>{{ $speciality->translate }}</td>
                                        <td>{{ $speciality->publishing ? 'Да' : 'Нет' }}</td>
                                        <td><a href="{{ route('admin.speciality.edit', $speciality->id) }}"><i class="fas fa-pen"></i></a></td>
                                        <td><i class="delete-speciality-el text-danger fas fa-trash" data-id="{{ $speciality->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h6>Специальности не добавлены</h6>
            @endif
        </div>
    </div>
    <script type="text/javascript">
        if (document.querySelector(".delete-speciality")) {
            document.querySelector(".delete-speciality").addEventListener("click", (e) => {
                if (e.target.classList.contains("delete-speciality-el")) {
                    if (confirm('Удалить специальность?')) {
                        window.location = `/admin/speciality/${e.target.dataset.id}/delete`;
                    }
                }
            });
        };
    </script>
@endsection
