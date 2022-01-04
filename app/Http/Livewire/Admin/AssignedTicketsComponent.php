<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AssignedTicketsComponent extends Component
{
    public function render()
    {
        $myassignedtickets = Auth::user()->solved;

        $open = [];
        $pending = [];

        $myassignedtickets->each(function ($item) use (&$open, &$pending) {
            if ($item->status->name == 'Open')
            {
                $open[] = $item;
            }
            if ($item->status->name == 'Pending')
            {
                $pending[] = $item;
            }
        });

        return view('livewire.admin.assigned-tickets-component', compact('open', 'pending'))->layout('layouts.support-admin-dashboard');
    }
}
