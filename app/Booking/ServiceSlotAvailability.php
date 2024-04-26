<?php

namespace App\Booking;

use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ServiceSlotAvailability
{
    public function __construct(protected Collection $employees, protected Service $service) {}

    public function forPeriod(Carbon $startsAt, Carbon $endsAt)
    {
        $range = (new SlotGenerator($startsAt, $endsAt))->generate($this->service->duration);

        $this->employees->each(function (Employee $employee) {
            // get availability for employee
            // remove appointments for employee
            // add available employees to slots
            // clear up empty slots
        });
    }
}
