<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CustomRequestTicketComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.custom-request-ticket-component')->layout('layouts.support-admin-dashboard');
    }
}
