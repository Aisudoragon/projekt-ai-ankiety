<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class ShowForms extends Controller
{
    public function index()
        {
            $dane = Form::all();
            return view('browse', ['forms' => $dane]);
        }
}
