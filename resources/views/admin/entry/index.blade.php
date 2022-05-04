@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="mr-3">
            <h1>Онлайн записи</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            @if (isset($personals) && count($personals) > 0)
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ф.И.О</th>
                                    <th>Управление записами</th>
                                </tr>
                            </thead>
                            <tbody class="delete-personal">
                                @foreach ($personals as $personal)
                                    <tr>
                                        <td>{{ $personal->id }}</td>
                                        <td>{{ $personal->fullname }}</td>
                                        <td><a href="{{ route('admin.entry.create', $personal->id) }}" class="btn btn-success">Записи</a></td>
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
@endsection
