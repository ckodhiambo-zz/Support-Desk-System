<?php

namespace App\Http\Livewire\Employee;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TicketsComponent extends Component
{
    public function render()
    {
        // Fetch user object
        $mytickets = Auth::user()->requested;

//        dd($user);

//        $mytickets = Tickets::orderBy('id', 'ASC')->paginate(10);

        return view('livewire.employee.tickets-component', compact('mytickets'))->layout('layouts.support-admin-dashboard');
    }




}
