<?php

namespace App\Http\Livewire\Admin;

use App\Mail\CustomEmailRequest;
use App\Models\Category;
use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CustomRequestTicketComponent extends Component
{
    public function render()
    {
        $categories = Category::with('assets')->get();

        $users = User::where('user_type', 'Agent')->orWhere('user_type', 'Administrator')->get();

        return view('livewire.admin.custom-request-ticket-component', compact('users'), ['categories' => $categories])->layout('layouts.support-admin-dashboard');
    }

    public function submitCustomTicket(Request $request)
    {
        $request->session()->reflash();
        $requester_id = $request->input('requester_id');
        $subject = $request->input('subject');
        $asset_name = $request->input('asset_name');
        $incident_name = $request->input('incident_name');
        $channel = $request->input('channel');
        $description = $request->input('description');
        $attachment = $request->file('attachment');

        $destinationPath = 'files/tickets/attachments/';

        $path = Storage::put($destinationPath, $attachment);

        $ticket = new Tickets([
            'asset_name' => $asset_name,
//            'channel' => $channel,
            'issue' => $incident_name,
            'attachment' => $path,
            'subject' => $subject,
            'description' => $description
        ]);

        $requester = User::find($requester_id);

        $status = status::whereName('New')->first();

        $ticket->requester()->associate($requester);

        $ticket->status()->associate($status);

        $ticket->save();

        // Set status
        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $ticket->id,
            'old_status' => 'None',
            'new_status' => 'New',
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

       Mail::to($ticket->requester->email)->send(new CustomEmailRequest($ticket));


//     Mail::to('calvinsken89@gmail.com')->send(new RaisedTicketMail($ticket));
//
//        Mail::to(Auth::user()->email)->send(new RequesterFirstNotification($ticket));

        return redirect('/admin/dashboard')->with('message_sent', 'You have successfully created a custom ticket!');

    }
}
