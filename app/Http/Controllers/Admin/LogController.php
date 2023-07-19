<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemAdapter;

class LogController extends Controller
{
    private FilesystemAdapter $storage;

    public function __construct()
    {
        $this->storage = Storage::disk('logs');
    }

    public function index(): View
    {

        $logs = $this->storage->files();

        $logs = array_filter($logs, function (string $file): bool {
            return str_ends_with($file, '.log');
        });

        return view('admin.logs.index', compact('logs'));
    }

    public function show(string $log): View
    {

        abort_unless(str_ends_with($log, '.log'), 404);
        abort_unless($this->storage->exists($log), 404);

        $content = $this->storage->get($log);

        return view('admin.logs.show', compact('log', 'content'));
    }

    public function delete(string $log)
    {
        abort_unless(str_ends_with($log, '.log'), 404);
        abort_unless($this->storage->exists($log), 404);

        $this->storage->delete($log);

        return view('admin.logs.index');
    }
}
