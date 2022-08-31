<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('cpanel.dashboard', get_defined_vars());
    }

    public function underconstruction()
    {
    	return view('underconstruction', get_defined_vars());
    }
}
