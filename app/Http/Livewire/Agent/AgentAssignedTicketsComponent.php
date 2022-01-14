<?php

namespace App\Http\Livewire\Agent;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AgentAssignedTicketsComponent extends Component
{
    public function render()
    {
        $myassignedtickets = Auth::user()->solved;

        $open = [];
        $pending = [];
        $partially_solved = [];
        $cancelled = [];
        $solved = [];

        $myassignedtickets->each(function ($item) use (&$open, &$pending, &$partially_solved, &$cancelled, &$solved ) {
            if ($item->status->name == 'Open') {
                $open[] = $item;
            }
            if ($item->status->name == 'Pending') {
                $pending[] = $item;
            }
            if ($item->status->name == 'Partially_solved') {
                $partially_solved[] = $item;
            }
            if ($item->status->name == 'Cancelled') {
                $cancelled[] = $item;
            }
            if ($item->status->name == 'Solved') {
                $solved[] = $item;
            }

        });

        return view('livewire.agent.agent-assigned-tickets-component', compact('open', 'pending','partially_solved','cancelled','solved'))->layout('layouts.support-agent-dashboard');
    }
}
