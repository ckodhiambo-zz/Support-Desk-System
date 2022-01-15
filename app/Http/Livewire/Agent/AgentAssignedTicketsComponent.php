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
        $in_progress = [];
        $on_hold = [];
        $partially_solved = [];
        $cancelled = [];
        $solved = [];

        $myassignedtickets->each(function ($item) use (&$open, &$on_hold,&$in_progress, &$partially_solved, &$cancelled, &$solved ) {
            if ($item->status->name == 'Open') {
                $open[] = $item;
            }
            if ($item->status->name == 'In-progress') {
                $in_progress[] = $item;
            }
            if ($item->status->name == 'On-Hold') {
                $on_hold[] = $item;
            }
            if ($item->status->name == 'Partially_Solved') {
                $partially_solved[] = $item;
            }
            if ($item->status->name == 'Cancelled') {
                $cancelled[] = $item;
            }
            if ($item->status->name == 'Solved') {
                $solved[] = $item;
            }

        });

        return view('livewire.agent.agent-assigned-tickets-component', compact('open','in_progress', 'on_hold','partially_solved','cancelled','solved'))->layout('layouts.support-agent-dashboard');
    }
}
