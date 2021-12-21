<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tickets;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $alltickets = Tickets::orderBy('id', 'ASC')->paginate(5);

        return view('livewire.admin.admin-dashboard-component', compact('alltickets'))->layout('layouts.support-admin-dashboard');
    }
}
