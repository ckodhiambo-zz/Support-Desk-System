<?php

namespace App\Http\Livewire\Admin;

use App\Mail\AdminAsRequester;
use App\Mail\RaisedTicketMail;
use App\Mail\RequesterFirstNotification;
use App\Models\status;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class TicketFormComponent extends Component
{
    public function render()
    {

        return view('livewire.admin.ticket-form-component')->layout('layouts.support-admin-dashboard');
    }

    public function submitTicket(Request $request)
    {
        $request->session()
            ->reflash();

        $subject = $request->input('subject');
        $asset_name = $request->input('asset_name');
        $incident_name = $request->input('incident_name');
        $description = $request->input('description');

        $ticket = new Tickets([
            'asset_name' => $asset_name,
            'issue' => $incident_name,
            'subject' => $subject,
            'description' => $description
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $ext = $file->getClientOriginalExtension();
            //Current time and file extension
            $filename = time() . '.' . $ext;
            $file->move('assets/attachment', $filename);
            $ticket->attachment = $filename;
        }

        $requester = Auth::user();

        $status = status::whereName('New')->first();

        $ticket->requester()->associate($requester);

        $ticket->status()->associate($status);

        $ticket->save();

        // Set status
        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::user()->name,
            'old_status' => 'None',
            'new_status' => 'New',
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        Mail::to('k.odhiambo@centum.co.ke')
            ->cc('calvinsken89@gmail.com')
            ->send(new RaisedTicketMail($ticket));

        Mail::to(Auth::user()->email)->send(new AdminAsRequester($ticket));

        return redirect('/admin/dashboard/my-tickets')->with('message_sent','Your ticket has been successfully raised and an email sent to our team!');
    }
}
