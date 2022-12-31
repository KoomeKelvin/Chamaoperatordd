<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ReportForm extends Component
{
    use WithPagination;
    public $duties;
    public function mount($duties)
    {
        $this->duties=$duties;
    }
    public function render()
    {

        return view('report-form')->with(
         ['thependingduties'=>$this->duties->whereHas('status', function($q) {
            $q->where('level', 'LIKE',  '%'.'pending'.'%');
        })->paginate(2)])
        ->with(
        ['thedoneduties'=>$this->duties->whereHas('status', function($q) {
            $q->where('level', 'LIKE',  '%'.'done'.'%');
        })->paginate(2)]
        )->with(
        ['dutieswithoutstatus'=> $this->duties::whereDoesntHave('status')->paginate(2)] 
        );
    }
}
