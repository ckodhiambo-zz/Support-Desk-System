<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\AfricasTalking\AfricasTalkingAPI;
use App\Mail\FirstAgentNotification;
use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $alltickets = Tickets::orderBy('id', 'DESC')->paginate(5);

        $users = User::where('user_type', 'Administrator')->get();

        return view('livewire.admin.admin-dashboard-component', compact('alltickets', 'users'))->layout('layouts.support-admin-dashboard');
    }

    public function setSolver(Request $request)
    {
        $user = User::find($request->input('admin'));


        $ticket = Tickets::find($request->input('ticket'));

        $old_status = $ticket->status->name;

        $new_status = 'Open';

        $ticket->solver()->associate($user);

        $ticket->status()->associate(status::whereName('Open')->first());

        $ticket->save();

        if ($request->input('phone_number') == 'true') {
            $at = new AfricasTalkingAPI();

            $response = $at->sms($user->phone_number, 'Precision Desk - Dear ' . $user->name . ', You have been assigned ticket-id #' . $ticket->id . ' from: '.$ticket->requester->name.'. Kindly login to your portal for more info: support.tierdata.co.ke.');

            if ($response['status'] == 'success') {
                return back()->with('message_sent', 'An email and SMS notification has been sent successfully to the assigned agent!');
            }
        }

        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $ticket->id,
            'old_status' => $old_status,
            'new_status' => $new_status,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        Mail::to($ticket->solver->email)->send(new FirstAgentNotification($ticket));

        return back()->with('message_sent', 'An email has been sent successfully to the assigned agent!');
    }
}
