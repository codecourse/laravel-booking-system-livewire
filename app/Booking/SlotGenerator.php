<?php

namespace App\Booking;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

class SlotGenerator
{
    public function __construct(protected Carbon $startsAt, protected Carbon $endsAt) {}

    public function generate(int $interval)
    {
        $collection = new DateCollection();

        $days = CarbonPeriod::create($this->startsAt, '1 day', $this->endsAt);

        foreach ($days as $day) {
            $date = new Date($day);

            $times = CarbonPeriod::create($day->startOfDay(), $interval . ' minutes', $day->copy()->endOfDay());

            foreach ($times as $time) {
                $date->addSlot(new Slot($time));
            }

            $collection->push($date);
        }

        return $collection;
    }
}
