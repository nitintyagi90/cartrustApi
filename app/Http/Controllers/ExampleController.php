<?php

namespace App\Http\Controllers;
use App\Test;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function test()
    {
        return response()->json('test', 201);
    }
    //
}
