<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaibaMaisController extends Controller
{
    public function index()
    {
        // Vai procurar a view resources/views/saibamais.blade.php
        return view('saibamais');
    }
}
