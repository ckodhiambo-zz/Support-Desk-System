<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

class TicketsComponent extends Component
{
    public function render()
    {
        return view('livewire.employee.tickets-component')->layout('layouts.support-admin-dashboard');
    }
}
