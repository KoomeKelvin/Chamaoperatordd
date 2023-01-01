<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use App\Models\Duty;
use Illuminate\Support\Facades\Auth; 

class ReportForm extends Component
{
    use WithPagination;

    public function render()
    {

        $currentTeamId=Auth::user()->currentTeam->id;
        return view('report-form')->with(
         ['thependingduties'=>Duty::where('team_id', $currentTeamId)->whereHas('status', function($q) {
            $q->where('level', 'LIKE',  '%'.'pending'.'%');
        })->oldest('deadline')->paginate(5)])
        ->with(
        ['thedoneduties'=>Duty::where('team_id', $currentTeamId)->whereHas('status', function($q) {
            $q->where('level', 'LIKE',  '%'.'done'.'%');
        })->oldest('deadline')->paginate(5)]
        )->with(
        ['dutieswithoutstatus'=>Duty::where('team_id', $currentTeamId)->whereDoesntHave('status')->oldest('deadline')->paginate(5)] 
        );
    }
}
