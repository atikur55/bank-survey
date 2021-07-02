<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileCreateController extends Controller
{
    public function file_create()
    {
        return view('admin.create.file');
    }
}
