<?php

use App\Booking\ScheduleAvailability;
use App\Livewire\EmployeeShow;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/employees/{employee:slug}', EmployeeShow::class)->name('employees.show');

Route::get('/periods', function () {
    $availability = (new ScheduleAvailability())->forPeriod(now()->startOfDay(), now()->addDay()->endOfDay());

    dd($availability);
});
