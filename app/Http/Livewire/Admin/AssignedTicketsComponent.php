<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\AfricasTalking\AfricasTalkingAPI;
use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AssignedTicketsComponent extends Component
{
    public function render()
    {
        $myassignedtickets = Auth::user()->solved;

        $open = [];
        $in_progress = [];
        $on_hold = [];
        $partially_solved = [];
        $cancelled = [];
        $solved = [];
        $archived = [];

        $myassignedtickets->each(function ($item) use (&$open, &$in_progress, &$on_hold, &$partially_solved, &$cancelled, &$solved, &$archived ) {
            if ($item->status->name == 'Open') {
                $open[] = $item;
            }
            if ($item->status->name == 'In-Progress') {
                $in_progress[] = $item;
            }
            if ($item->status->name == 'On-Hold') {
                $on_hold[] = $item;
            }
            if ($item->status->name == 'Partially_Solved') {
                $partially_solved[] = $item;
            }
            if ($item->status->name == 'Cancelled') {
                $cancelled[] = $item;
            }
            if ($item->status->name == 'Solved') {
                $solved[] = $item;
            }
            if ($item->status->name == 'Archived') {
                $archived[] = $item;
            }

        });

        return view('livewire.admin.assigned-tickets-component', compact('open', 'in_progress','on_hold','partially_solved','cancelled','solved','archived'))->layout('layouts.support-admin-dashboard');
    }

    public function setDelegatee(Request $request)
    {
        $user = User::find($request->input('agent'));

        $ticket = Tickets::find($request->input('ticket'));

        $old_status = $ticket->status->name;

        $new_status = 'Open';

        $ticket->delegatee()->associate($user);

        $ticket->status()->associate(status::whereName('Open')->first());

        $ticket->save();

        if ($request->input('phone_number') == 'true') {
            $at = new AfricasTalkingAPI();

            $response = $at->sms($user->phone_number, 'Precision Desk - Dear ' . $user->name . ', Ticket-id #5 from: ' . $ticket->requester->name . ' is an overdue ticket and has been escalated to you. The assigned agent is Kennedy Odhiambo (U-26). Kindly login to your portal for more info: https://desk.precision.ke/.');

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

        return back()->with('message_sent', 'The ticket has been successfully to delegated and email sent!');



    }

}
