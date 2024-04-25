<?php

namespace App\Booking;

use Carbon\Carbon;
use Spatie\Period\Period;
use Spatie\Period\PeriodCollection;
use Spatie\Period\Precision;

class ScheduleAvailability
{
    protected PeriodCollection $periods;

    public function __construct()
    {
        $this->periods = new PeriodCollection();
    }

    public function forPeriod()
    {
        $this->periods = $this->periods->add(
            Period::make(
                now()->startOfDay(),
                now()->addDay()->endOfDay(),
                Precision::MINUTE()
            )
        );

        $this->periods = $this->periods->subtract(
            Period::make(
                Carbon::createFromTimeString('12:00'),
                Carbon::createFromTimeString('13:00'),
                Precision::MINUTE()
            )
        );

        return $this->periods;
    }
}
