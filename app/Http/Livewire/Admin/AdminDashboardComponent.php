<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\AfricasTalking\AfricasTalkingAPI;
use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $alltickets = Tickets::orderBy('id', 'DESC')->paginate(8);

        $users = User::where('user_type', 'Administrator')->get();

        return view('livewire.admin.admin-dashboard-component', compact('alltickets', 'users'))->layout('layouts.support-admin-dashboard');
    }

    public function setSolver(Request $request)
    {
        $user = User::find($request->input('admin'));


        $ticket = Tickets::find($request->input('ticket'));

//        $user = User::find($request->input('admin'));

        $ticket->solver()->associate($user);

        $ticket->status()->associate(status::whereName('Open')->first());

        $ticket->save();

        if ($request->input('phone_number') == 'true') {
            $at = new AfricasTalkingAPI();

            $response = $at->sms($user->phone_number, 'Precision Desk - Dear ' . $user->name . ', You have an open ticket that has been assigned to you by your administrator. Kindly proceed to your precision desk dashboard to assist in resolving the ticket.');

            if ($response['status'] == 'success') {
                return back()->with('message_sent', 'An email and SMS notification has been sent successfully to the assigned agent!');
            }
        }

        return back()->with('message_sent', 'An email has been sent successfully to the assigned agent!');
    }
}
