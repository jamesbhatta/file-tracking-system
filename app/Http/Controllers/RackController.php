<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Rack;
use Illuminate\Http\Request;

class RackController extends Controller
{
    public function index()
    {
        return view('rack.index', [
         'racks' => Rack::get(),
         'file' => new File,
         'updateMode' => false,
        ]);
    }
}
