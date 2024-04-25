<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeeShow extends Component
{
    public Employee $employee;

    public function render()
    {
        return view('livewire.employee-show');
    }
}
