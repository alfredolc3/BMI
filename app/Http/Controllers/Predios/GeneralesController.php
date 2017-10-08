<?php

namespace App\Http\Controllers\Predios;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GeneralesController extends Controller
{
    public function index()
    {
        return view('predios.generales');
    }

    public function store(Request $request)
    {

    }
}