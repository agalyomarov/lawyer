@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="mr-3">
            <h1>Достижения</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.dost.create') }}" type="button" class="btn btn-block btn-info">
                Добавить достижении
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (isset($dosts) && count($dosts) > 0)
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заголовок</th>
                                    <th>Дата</th>
                                    <th colspan="2">Действие</th>
                                </tr>
                            </thead>
                            <tbody class="delete-news">
                                @foreach ($dosts as $dost)
                                    <tr>
                                        <td>{{ $dost->id }}</td>
                                        <td>{{ $dost->title }}</td>
                                        <td>{{ $dost->created_at }}</td>
                                        <td><a href="{{ route('admin.dost.edit', $dost->id) }}"><i class="fas fa-pen"></i></a></td>
                                        <td><i class="delete-dost-el text-danger fas fa-trash" data-id="{{ $dost->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h6>достижении не добавлены</h6>
            @endif
        </div>
    </div>
    <script>
        const table = document.querySelector('tbody.delete-news');
        table.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-dost-el')) {
                const check = confirm('Вы действительно хотите удалить ');
                if (check) {
                    window.location.href = `/admin/dostizheniya/delete/${event.target.dataset.id}`;
                }
            }
        })
    </script>
@endsection
