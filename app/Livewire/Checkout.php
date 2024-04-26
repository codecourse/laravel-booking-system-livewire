<?php

namespace App\Livewire;

use App\Booking\AvailabilityTransformer;
use App\Booking\Date;
use App\Booking\ServiceSlotAvailability;
use App\Booking\Slot;
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

    public function setDate(?string $date)
    {
        if (is_null($date)) {
            return;
        }

        $this->form->date = $date;
    }

    public function setTime(string $time)
    {
        $this->form->time = $time;

        if (!$this->employee) {
            $this->employee = $this->getNextAvailableEmployee();
        }
    }

    protected function getNextAvailableEmployee()
    {
        return $this->slots->first(function (Slot $slot) {
            return $slot->time->toTimeString('minutes') === $this->form->time;
        })
            ->employees->first();
    }

    #[Computed()]
    public function times()
    {
        return $this->slots?->map(function (Slot $slot) {
            return $slot->time->toTimeString('minutes');
        })
            ->values();
    }

    #[Computed()]
    public function slots()
    {
        return $this->availability->first(function (Date $date) {
            return $date->date->toDateString() === $this->form->date;
        })?->slots;
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
