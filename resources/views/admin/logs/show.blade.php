@extends('admin.layouts.base')

@section('admin.title', 'Логи')

@section('admin.action', )
    <form action="{{ route('admin.logs.delete', $log) }}" method="POST">
        @method('delete')
        @csrf

        <button type="submit" class="btn btn-danger btn-sm">
            Удалить
        </button>
    </form>
@endsection

@section('admin.content')
    <div class="card mb-3">
        <div class="card-body pb-0">
            <h6 class="m-0">
                Содержание лога
            </h6>
        </div>

        <div class="card-body">
            {{ $content }}
        </div>
    </div>
@endsection
