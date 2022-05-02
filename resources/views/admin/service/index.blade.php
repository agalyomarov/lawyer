@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-1">
            <h1 class="m-0">Услиги</h1>
        </div>
        <div class="col-sm-2">
            <a href="{{ route('admin.service.create') }}" type="button" class="btn btn-block btn-info">
                Добавить услугу
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (isset($services) && count($services) > 0)
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Цена</th>
                                    <th>Длительност</th>
                                    <th>Опубликовано</th>
                                    <th colspan="2">Действие</th>
                                </tr>
                            </thead>
                            <tbody class="delete-service">
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>{{ $service->duration }}</td>
                                        <td>{{ $service->publishing ? 'Да' : 'Нет' }}</td>
                                        <td><a href="{{ route('admin.service.edit', $service->id) }}"><i class="fas fa-pen"></i></a></td>
                                        <td><i class="delete-service-el text-danger fas fa-trash" data-id="{{ $service->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h6>Услуги не добавлены</h6>
            @endif
        </div>
    </div>
    <script type="text/javascript">
        document.querySelector(".delete-service").addEventListener("click", (e) => {
            if (e.target.classList.contains("delete-service-el")) {
                if (confirm('Удалить услигу?')) {
                    window.location = `/admin/service/${e.target.dataset.id}/delete`;
                }
            }
        })
    </script>
@endsection
