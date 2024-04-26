<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentShow extends Component
{
    public Appointment $appointment;

    public function cancelAppointment()
    {
        $this->appointment->update([
            'cancelled_at' => now()
        ]);
    }

    public function render()
    {
        return view('livewire.appointment-show');
    }
}
