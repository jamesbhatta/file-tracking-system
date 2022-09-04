<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FileController extends Controller
{
    public function index()
    {
        return view('file.index', [
            'files' => File::with('rack')
                ->when(request()->filled('number'), function ($q) {
                    $q->where('number', 'like', request('number') . '%');
                })->paginate()
        ]);
    }

    public function create()
    {
        return $this->showForm(new File());
    }

    private function showForm(File $file)
    {
        return view('file.form', [
            'file' => $file,
            'updateMode' => $file->exists,
            'racks' => Rack::get()
        ]);
    }

    public function store(Request $request)
    {
        File::create($request->validate([
            'number' => ['required'], // TODO::validate unique
            'rack_id' => ['required', 'exists:racks,id'],
        ]));

        return redirect()->route('files.index')->with('success', 'File have been added.');
    }


    public function edit(File $file)
    {
        return $this->showForm($file);
    }


    public function update(Request $request, File $file)
    {
        $file->update($request->validate([
            'number' => ['required'], // TODO::validate unique
            'rack_id' => ['required', 'exists:racks,id'],
        ]));

        $this->banner('File have been modified.');
        return redirect()->route('files.index');
    }

    public function destroy(File $file)
    {
        $file->delete();

        $this->banner('File have been deleted.');
        return redirect()->route('files.index');
    }
}
