<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function helloWorld()
    {
        return view('hello-world');
    }

    public function hello($name = 'Fulano')
    {
        return 'Hello, ' . $name;
    }
}
