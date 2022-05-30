<?php

namespace App\Http\Livewire\Employee;

use App\Mail\RaisedTicketMail;
use App\Mail\RequesterFirstNotification;
use App\Models\Asset;
//use App\Models\AssetType;
use App\Models\Category;
use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        return view('livewire.employee.employee-dashboard-component', ['categories' => $categories])->layout('layouts.support-employee-dashboard');
    }

    public function submitTicket(Request $request)
    {
        $request->session()
            ->reflash();

        $subject = $request->input('subject');
        $asset_name = $request->input('asset_name');
        $incident_name = $request->input('incident_name');
        $description = $request->input('description');
        $attachment = $request->file('attachment');

        $destinationPath = 'files/tickets/attachments/';

        $path = Storage::put($destinationPath, $attachment);

        $ticket = new Tickets([
            'asset_name' => $asset_name,
            'issue' => $incident_name,
            'attachment' => $path,
            'subject' => $subject,
            'description' => $description
        ]);

        $requester = Auth::user();

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

        Mail::to('calvinsken89@gmail.com')->send(new RaisedTicketMail($ticket));

        Mail::to(Auth::user()->email)->send(new RequesterFirstNotification($ticket));

        return redirect('/employee/dashboard/my-tickets')->with('message_sent','Your ticket has been successfully raised and an email sent to our team!');

    }



}
