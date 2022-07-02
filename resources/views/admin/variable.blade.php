@extends('layouts.admin')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Период уведомлении (час)</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-2 mt-5">
            <form method="post" action="{{ route('admin.variable.store') }}">
                @csrf
                <div class="form-group">
                    <select class="form-control" name="variable">
                        @for ($i = 1; $i < 25; $i++)
                            <option value="{{ $i }}" @if ($variable->variable == $i) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
        </div>
    </div>
@endsection
