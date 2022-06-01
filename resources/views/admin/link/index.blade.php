@extends('layouts.admin')

@section('content')
    <div class="row mb-2 ml-2">
        <div class="col-12">
            <h1 class="m-0"> Ссылки на консултации</h1>
        </div>
    </div>
    <div class="row mb-2 ml-2">
        <form action="{{ route('admin.link.store') }}" method="POST" class="col-6">
            @csrf
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" name="link">
                <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">Добавить</button>
                </span>
            </div>
        </form>

    </div>
    <div class="row">
        <div class="col-7 mt-4">
            @if (isset($links) && count($links) > 0)
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Ссылка</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody class="links">
                                @foreach ($links as $link)
                                    <tr>
                                        <td>{{ $link->link }}</td>
                                        <td><i class="delete-link text-danger fas fa-trash" data-id="{{ $link->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $links->links() !!}
            @endif
        </div>
    </div>
    <script>
        document.querySelector('tbody.links').addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-link')) {
                window.location.href = `/admin/link/delete/${e.target.dataset.id}`;
            }
        })
    </script>
@endsection
