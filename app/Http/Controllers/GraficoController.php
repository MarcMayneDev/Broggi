<?php

namespace App\Http\Controllers;

use App\Models\Comarques;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grafico.grafico');
    }
}
