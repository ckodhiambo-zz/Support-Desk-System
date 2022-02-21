<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;

class CustomRequestTicketComponent extends Component
{
    public function render()
    {
        $categories = Category::with('assets')->get();

        return view('livewire.admin.custom-request-ticket-component',['categories' => $categories])->layout('layouts.support-admin-dashboard');
    }

    public function submitCustomTicket(Request $request)
    {
        $request->session()->reflash();

        $asset_name = $request->input('asset_name');
    }
}
