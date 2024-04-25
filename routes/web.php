<?php

use App\Booking\ScheduleAvailability;
use App\Livewire\EmployeeShow;
use App\Livewire\Home;
use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

//Carbon::setTestNow(now()->addDay());

Route::get('/', Home::class)->name('home');
Route::get('/employees/{employee:slug}', EmployeeShow::class)->name('employees.show');

Route::get('/periods', function () {
    $employee = Employee::find(1);
    $service = Service::find(1);

    $availability = (new ScheduleAvailability($employee, $service))
            ->forPeriod(now()->startOfDay(), now()->endOfDay());

    dd($availability);
});
