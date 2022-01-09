<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TicketReportsComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.ticket-reports-component')->layout('layouts.support-admin-dashboard');
    }
}
