<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\employeesmodel;
class Employees extends Component
{
    public $employeeId;
    public $name;
    public $address;
    public $mobile;
 
    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    
    
    public function render()
    {
        
        return view('livewire.employees');
    }
}