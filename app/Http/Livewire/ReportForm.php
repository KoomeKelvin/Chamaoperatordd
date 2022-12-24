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
        return view('report-form', ['thependingduties'=>$this->duties->whereHas('status', function($q) {
            $q->where('level', 'LIKE',  '%'.'pending'.'%');
        })->paginate(2)], ['thedoneduties'=>$this->duties->whereHas('status', function($q) {
            $q->where('level', 'LIKE',  '%'.'done'.'%');
        })->paginate(2)],
        ['dutieswithoutstatus'=> $this->duties] 
    );
    }
}
