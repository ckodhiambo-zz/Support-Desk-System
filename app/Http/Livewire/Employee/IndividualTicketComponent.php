<?php

namespace App\Http\Livewire\Employee;

use App\Models\Tickets;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndividualTicketComponent extends Component
{
    public $ticket;

    public function mount(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }
    public function render(Tickets $ticket)
    {
        $history = DB::table('ticket_timestamps')->get();
        return view('livewire.employee.individual-ticket-component', compact('ticket', 'history'))->layout('layouts.support-employee-dashboard');
    }

    public function downloadPDF(Tickets $ticket)
    {
        $history = DB::table('ticket_timestamps')->get();
        $pdf = Pdf::loadView('livewire.employee.individual-ticket-component', compact('ticket', 'history'));
        return $pdf->download('My-Ticket-Details.pdf');

    }


}
