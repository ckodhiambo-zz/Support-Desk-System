<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function home()
    {
        if (Auth::user())
        {
            if (Auth::user()->user_type == 'Administrator')
            {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->user_type == 'Agent')
            {
                return redirect()->route('ticket.agent-assigned-tickets');
            }
        }

        return redirect()->route('default-user.home');
    }
}
