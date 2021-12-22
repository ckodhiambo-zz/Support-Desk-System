<?php

namespace App\Http\Livewire\Admin;

use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $alltickets = Tickets::orderBy('id', 'ASC')->paginate(5);

        $users = User::where('user_type', 'Administrator')->get();

        return view('livewire.admin.admin-dashboard-component', compact('alltickets', 'users'))->layout('layouts.support-admin-dashboard');
    }

    public function setSolver(Request $request)
    {
        $ticket = Tickets::find($request->input('ticket'));

        $user = User::find($request->input('admin'));

        $ticket->solver()->associate($user);

        $ticket->status()->associate(status::whereName('Open')->first());

        $ticket->save();

        return redirect()->back();
    }
}
