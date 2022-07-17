@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="mr-3">
            <h1>Новости</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-block btn-info">
                Добавить новости
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (isset($news) && count($news) > 0)
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
                            <tbody class="delete-personal">
                                @foreach ($news as $new)
                                    <tr>
                                        <td>{{ $new->id }}</td>
                                        <td>{{ $new->title }}</td>
                                        <td>{{ $new->created_at }}</td>
                                        <td><a href="{{ route('admin.personal.edit', $new->id) }}"><i class="fas fa-pen"></i></a></td>
                                        <td><i class="delete-news-el text-danger fas fa-trash" data-id="{{ $new->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h6>Новости не добавлены</h6>
            @endif
        </div>
    </div>
@endsection
