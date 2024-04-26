<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CheckoutForm extends Form
{
    #[Validate('required|date_format:Y-m-d')]
    public ?string $date = null;

    #[Validate('required|date_format:H:i')]
    public ?string $time = null;

    #[Validate('required')]
    public ?string $name = null;

    #[Validate('required|email')]
    public ?string $email = null;
}
