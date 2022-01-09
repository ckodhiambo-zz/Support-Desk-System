<?php

namespace App\Http\Livewire\Admin;

use App\Charts\TicketsChart;
use App\Models\Tickets;
use Livewire\Component;

class TicketReportsComponent extends Component
{
    public function render()
    {
        $tickets = Tickets::with('status')
            ->get()
            ->groupBy('status.name');


        $labels = $values = array();

        foreach ($tickets as $k => $v)
        {
            $labels[] = $k;
            $values[] = $v->count();
        }

        $chart1 = new TicketsChart();

        $chart1->labels($labels)->dataset(
            'Tickets per Status',
            'bar',
            $values
        )->backgroundcolor('#4b49ac');

        return view('livewire.admin.ticket-reports-component', compact('chart1'))->layout('layouts.support-admin-dashboard');
    }
}
