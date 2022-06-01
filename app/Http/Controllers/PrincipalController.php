<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index() {
        return view('home');
    }
}