<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tickets;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminIndividualTicketComponent extends Component
{
    public $ticket;

    public function mount(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }
    public function render(Tickets $ticket)
    {
        $history = DB::table('ticket_timestamps')->get();
        return view('livewire.admin.individual-ticket-component', compact('ticket', 'history'))->layout('layouts.support-admin-dashboard');
    }

}
