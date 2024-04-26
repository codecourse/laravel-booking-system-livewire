<?php

use App\Booking\ScheduleAvailability;
use App\Booking\ServiceSlotAvailability;
use App\Booking\SlotGenerator;
use App\Livewire\AppointmentShow;
use App\Livewire\Checkout;
use App\Livewire\EmployeeShow;
use App\Livewire\Home;
use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Carbon::setTestNow(now()->setTimeFromTimeString('10:00'));

Route::get('/', Home::class)->name('home');
Route::get('/employees/{employee:slug}', EmployeeShow::class)->name('employees.show');
Route::get('/checkout/{service:slug}/{employee:slug?}', Checkout::class)->name('checkout');

Route::get('/appointments/{appointment:uuid}', AppointmentShow::class)->name('appointments.show');
