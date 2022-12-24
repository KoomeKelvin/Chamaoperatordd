<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Duty;
use App\Models\Team;
use App\Models\User;
use App\Models\Priority;

class DutyController extends Controller
{
    //

    public function index()
    {
        $duties=Duty::latest()->get();
        return view('duties.index')->with('duties', $duties);
    }


    public function create()
    {
        return view('duties.create');

    }

    public function store(Request $request)
    {
       $data=Duty::validateDutyDetails($request);
        $duty=Duty::create($data);
        Duty::associateDuty($data, $duty);
        return redirect('/duties/'.$duty->id);
    }

    public function show(Duty $duty)
    {
        return view('duties.show', compact('duty'));
    }

    public function edit(Duty $duty)
    {
       $duty=Duty::where('id', $duty->id)->first();
       return view('duties.edit')->with('duty', $duty);
    }

    public function update(Duty $duty, Request $request)
    {
       $data=Duty::validateDutyDetails($request);
       $duty->update($data);
       Duty::associateDuty($data, $duty);
       return redirect('/duties/'.$duty->fresh()->id);
    }

    public function destroy(Duty $duty)
    {
        $duty->delete();
        return redirect('/duties');
    }
}
