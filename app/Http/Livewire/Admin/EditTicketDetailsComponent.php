<?php

namespace App\Http\Livewire\Admin;

use App\Models\status;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Livewire\Component;

class EditTicketDetailsComponent extends Component
{
    public $ticket;

    public function mount(Tickets $ticket)
    {
        $this->post = $ticket;
    }

    public function render(Tickets $ticket)
    {
        return view('livewire.admin.edit-ticket-details-component', compact('ticket'))->layout('layouts.support-admin-dashboard');
    }
}
