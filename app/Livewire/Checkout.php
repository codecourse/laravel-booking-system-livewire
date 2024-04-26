<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Service;
use Livewire\Component;

class Checkout extends Component
{
    public Service $service;

    public Employee $employee;

    public function render()
    {
        return view('livewire.checkout');
    }
}
