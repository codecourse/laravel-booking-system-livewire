<?php

namespace App\Livewire;

use App\Booking\AvailabilityTransformer;
use App\Booking\ServiceSlotAvailability;
use App\Livewire\Forms\CheckoutForm;
use App\Models\Employee;
use App\Models\Service;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Checkout extends Component
{
    public Service $service;

    public ?Employee $employee = null;

    public CheckoutForm $form;

    public function mount()
    {
        $this->form->date = $this->availability->firstAvailableDate()?->date->toDateString() ?? now()->toDateString();
    }

    #[Computed()]
    public function availabilityJson()
    {
        return new AvailabilityTransformer($this->availability);
    }

    #[Computed(persist: true)]
    public function availability()
    {
        return (new ServiceSlotAvailability(
            $this->employee ? collect([$this->employee]) : Employee::get(), $this->service
        ))
            ->forPeriod(
                now()->startOfDay(),
                now()->addMonths(3)->endOfDay()
            );
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
