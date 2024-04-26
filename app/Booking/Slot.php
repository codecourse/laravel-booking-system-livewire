<?php

namespace App\Booking;

use Carbon\Carbon;

class Slot
{
    public function __construct(public Carbon $time)
    {
    }
}
