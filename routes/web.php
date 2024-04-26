<?php

use App\Booking\ScheduleAvailability;
use App\Booking\ServiceSlotAvailability;
use App\Booking\SlotGenerator;
use App\Livewire\EmployeeShow;
use App\Livewire\Home;
use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Carbon::setTestNow(now()->setTimeFromTimeString('10:00'));

Route::get('/', Home::class)->name('home');
Route::get('/employees/{employee:slug}', EmployeeShow::class)->name('employees.show');

Route::get('/periods', function () {
    $employees = Employee::get();
    $service = Service::find(1);

    $availability = (new ServiceSlotAvailability($employees, $service))
        ->forPeriod(now()->startOfDay(), now()->addDay()->endOfDay());

    dd($availability);
});
