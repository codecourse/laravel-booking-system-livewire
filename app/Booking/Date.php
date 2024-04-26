<?php

namespace App\Booking;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class Date
{
    public Collection $slots;

    public function __construct(public Carbon $date)
    {
        $this->slots = collect();
    }

    public function addSlot(Slot $slot)
    {
        $this->slots->push($slot);
    }

    public function containsSlot(string $timeToCheck)
    {
        return $this->slots->contains(function (Slot $slot) use ($timeToCheck) {
            return $slot->time->toTimeString('minutes') === $timeToCheck;
        });
    }
}
