<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Duty;
use App\Models\User;
use App\Models\Teams;
use App\Models\Priority;
class CreateDutyForm extends Component
{

    public $priorities= [];
    public $dutyFields=[
        'name'=>'',
        'description'=>'',
        'deadline'=>'', 
        'chosenPriority'=>null,
    ];
    
    protected $rules= [
        'dutyFields.name'=>'required|max:255',
        'dutyFields.description'=>'required|max:255',
        'dutyFields.deadline'=>'required|max:255',
        'dutyFields.chosenPriority'=>'required|max:255',
    ]; 

    protected $validationAttributes = [
        'dutyFields.name'=>'duty name',
        'dutyFields.description'=>'duty Description',
        'dutyFields.deadline'=>'deadline',
        'dutyFields.chosenPriority'=>'priority',
    ]; 
    
    public function createDuties()
    {

        $this->validate();
     
       $duty=new Duty;
       $duty->name=$this->dutyFields['name'];
       $duty->description=$this->dutyFields['description'];
       $duty->deadline=$this->dutyFields['deadline'];
       $duty->priority()->associate($this->dutyFields['chosenPriority']);
       $duty->user()->associate(auth()->user()->id);
       $duty->team()->associate(auth()->user()->currentTeam->id);
       $duty->save();
       $this->resetFields();
       $this->emit('created');
    }

    public function resetFields()
        {
            $this->dutyFields=[
                'name'=>'',
                'description'=>'',
                'deadline'=>'', 
                'chosenPriority'=>''
            ];
        }

    public function render()
    {
        $this->priorities=Priority::orderBy('id', 'asc')->get();
        return view('duties.create-duty-form');
    }
}
