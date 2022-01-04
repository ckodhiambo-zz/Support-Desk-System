<?php

namespace App\Http\Controllers;

use App\Models\status;
use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function updateStatus(Request $request, Tickets $ticket)
    {
        $ticket->update([
            'admin_reason' => $request->input('description')
        ]);

        $ticket->refresh()->status()->associate(status::whereName($request->input('optionsRadios'))->first())->save();

        return redirect('/admin/dashboard/my-assigned-tickets');
    }
}
