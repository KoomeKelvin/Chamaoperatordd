<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Duty;


class DutyStatusController extends Controller
{
    //
    

    public function index()
    {
        $duties=app(Duty::class);
        return view('duty-status.index', ['duties'=>$duties]);
    }
    public function store(Request $request)
    {
        $data=Status::validateStatus($request);
        $status=Status::create($data);
        Status::associateStatus($status, $data);
        return redirect('/duty-status/'.$status->id);
    }
}
