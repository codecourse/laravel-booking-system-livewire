<?php

namespace App\Booking;

use App\Models\Employee;

class AvailabilityTransformer
{
    public function __construct(protected DateCollection $availability)
    {
    }

    public function __toString(): string
    {
        return $this->availability->map(function (Date $date) {
            return [
                'date' => $date->date->toDateString(),
                'slots' => $date->slots->map(function (Slot $slot) {
                    return [
                        'time' => $slot->time->toTimeString('minute'),
                        'employee' => $slot->employees->map(function (Employee $employee) {
                            return $employee->slug;
                        })->values()
                    ];
                })
                    ->values()
            ];
        })
            ->values();
    }
}
