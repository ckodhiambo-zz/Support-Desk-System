<?php

namespace App\Http\Livewire\Nabo;

use App\Models\Category;
use Livewire\Component;

class NaboDashboardComponent extends Component
{
    public function render()
    {
        $categories = Category::with('assets')->get();
        return view('livewire.nabo.nabo-dashboard-component', ['categories' => $categories])->layout('layouts.support-nabo-dashboard');
    }
}
