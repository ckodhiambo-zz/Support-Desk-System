<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AssignedTicketsComponent extends Component
{
    public function render()
    {
        $myassignedtickets = Auth::user()->solved;


        return view('livewire.admin.assigned-tickets-component', compact('myassignedtickets'))->layout('layouts.support-admin-dashboard');
    }
}
