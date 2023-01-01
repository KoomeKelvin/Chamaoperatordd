<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Duty;
use App\Models\Status;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class CreateDutyStatusForm extends Component
{
    use WithPagination;
    public $duties;

    public $statuses=[0=>'pending', 1=>'done'];
    public $createDutyStatus=[
        'selectedStatus'=> ''
    ];

    protected $rules=[
        'createDutyStatus.selectedStatus'=>'required'
    ];

    protected $validationAttributes=[
        'createDutyStatus.selectedStatus'=>'Progress status'
    ];

    public function createDutyStatus($id)
    {
        $this->duties=' ';
    
        $validatedData=$this->validate();
        if($this->createDutyStatus['selectedStatus']=='pending'){
            $status_id=1;
        }else{
            $status_id=2;
        }
        $duty=Duty::findOrFail($id);
        $duty->status()->updateOrCreate(['id'=>$id], ['level'=>$this->createDutyStatus['selectedStatus']]);
        $this->resetFields();
        $this->emit($duty->id);
        $this->duties=new Duty;
    }

    public function mount()
    {
    
    }

    public function render()
    {
        $currentTeamId=Auth::user()->currentTeam->id;
        return view('duty-status.duty-status-create', ['theduties'=>Duty::where('team_id', $currentTeamId)->oldest('deadline')->paginate(5)]);
    }

    public function resetFields()
    {
        $this->createDutyStatus=[
            'selectedStatus'=>'',
        ];
    }
}
