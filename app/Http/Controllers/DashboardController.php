<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Duty;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $duties=app(Duty::class);
        return view('dashboard', ['duties'=>$duties]);
    }
}
