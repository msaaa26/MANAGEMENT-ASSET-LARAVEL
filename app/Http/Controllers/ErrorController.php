<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function forbidden() {
        $title = '403 Forbidden';
        return view('error.403', compact('title'));
    }
}
