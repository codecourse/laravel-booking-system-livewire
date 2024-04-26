<?php

namespace App\Booking;

use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\Period\Period;

class ServiceSlotAvailability
{
    public function __construct(protected Collection $employees, protected Service $service) {}

    public function forPeriod(Carbon $startsAt, Carbon $endsAt)
    {
        $range = (new SlotGenerator($startsAt, $endsAt))->generate($this->service->duration);

        $this->employees->each(function (Employee $employee) use ($startsAt, $endsAt, &$range) {
            $periods = (new ScheduleAvailability($employee, $this->service))->forPeriod($startsAt, $endsAt);

            foreach ($periods as $period) {
                $this->addAvailableEmployeeForPeriod($range, $period, $employee);
            }
        });

        $range = $this->removeEmptySlots($range);

        return $range;
    }

    protected function removeEmptySlots(DateCollection $range)
    {
        return $range->filter(function (Date $date) {
            $date->slots = $date->slots->filter(function (Slot $slot) {
                return $slot->hasEmployees();
            });

            return true;
        });
    }

    protected function addAvailableEmployeeForPeriod(DateCollection $range, Period $period, Employee $employee)
    {
        $range->each(function (Date $date) use ($period, $employee) {
            $date->slots->each(function (Slot $slot) use ($period, $employee) {
                if ($period->contains($slot->time)) {
                    $slot->addEmployee($employee);
                }
            });
        });
    }
}
