<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function fetch_data(Request $req)
    {
       
        return $req->input();
    }
}
