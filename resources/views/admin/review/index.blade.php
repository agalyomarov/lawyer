@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="mr-3">
            <h1>Отзывы</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.review.create') }}" type="button" class="btn btn-block btn-info">
                Добавить отзывы
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (isset($reviews) && count($reviews) > 0)
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя </th>
                                    <th colspan="2">Действие</th>
                                </tr>
                            </thead>
                            <tbody class="delete-news">
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->name }}</td>
                                        <td><a href="{{ route('admin.review.edit', $review->id) }}"><i class="fas fa-pen"></i></a></td>
                                        <td><i class="delete-article-el text-danger fas fa-trash" data-id="{{ $review->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h6>отзывы не добавлены </h6>
            @endif
        </div>
    </div>
    <script>
        const table = document.querySelector('tbody.delete-news');
        table.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-article-el')) {
                const check = confirm('Вы действительно хотите удалить ');
                if (check) {
                    window.location.href = `/admin/review/delete/${event.target.dataset.id}`;
                }
            }
        })
    </script>
@endsection
