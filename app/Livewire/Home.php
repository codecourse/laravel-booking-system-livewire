<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Service;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }
}
