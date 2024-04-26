<?php

namespace App\Booking;

use Illuminate\Support\Collection;

class DateCollection extends Collection
{
    public function firstAvailableDate()
    {
        return $this->first(function (Date $date) {
            return $date->slots->isNotEmpty();
        });
    }

    public function forDate(string $dateToCheck)
    {
        return $this->first(function (Date $date) use ($dateToCheck) {
            return $date->date->toDateString() === $dateToCheck;
        });
    }
}
