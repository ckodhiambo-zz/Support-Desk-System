<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class FromEmailTicketComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.from-email-ticket-component')->layout('layouts.support-admin-dashboard');
    }
}
