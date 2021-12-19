<?php

namespace App\Http\Livewire\Employee;

use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Category;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Exception;
use Illuminate\Support\Facades\Log;

class EmployeeDashboardComponent extends Component
{

//    public $categories;

    public function render()
    {
        $categories = Category::with('assets')->get();
        return view('livewire.employee.employee-dashboard-component', ['categories' => $categories])->layout('layouts.support-admin-dashboard');
    }

}
