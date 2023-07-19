<div class="card mb-3">
    <div class="card-body pb-0">
        <h6 class="m-0">
            Файлы логов
        </h6>
    </div>

    <div class="card-body">
        @if(count($logs) > 0)
            <div class="table-responsive">
                <table class="table table-borderless text-nowrap mb-0">
                    @foreach($logs as $log)
                        <tr>
                            <td>
                                <a href="{{ route('admin.logs.show', $log) }}">
                                    {{ $log }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            Нет ни одной записи.
        @endif
    </div>
</div>
