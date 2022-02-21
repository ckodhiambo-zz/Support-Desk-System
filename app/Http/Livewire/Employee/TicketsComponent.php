<?php

namespace App\Http\Livewire\Employee;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TicketsComponent extends Component
{
    public $ticket;

    public function mount(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render(Tickets $ticket)
    {
        // Fetch user object
        $mytickets = Auth::user()->requested;

        return view('livewire.employee.tickets-component', compact('mytickets','ticket'))->layout('layouts.support-employee-dashboard');
    }




}
