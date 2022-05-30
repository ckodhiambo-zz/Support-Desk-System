<?php

namespace App\Http\Livewire\Nabo;

use App\Models\Category;
use Livewire\Component;

class ExternalTicketComponent extends Component
{
    public function render()
    {
        $categories = Category::with('assets')->get();
        return view('livewire.nabo.external-ticket-component', ['categories' => $categories])->layout('layouts.support-nabo-dashboard');
    }
}
