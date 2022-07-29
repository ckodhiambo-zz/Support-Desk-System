<?php

namespace App\Console\Commands;

use App\Mail\EscalationMail;
use App\Mail\RequesterFirstNotification;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EscalateNewTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:escalate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Escalate unassigned tickets';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch tickets that have not been assigned yet
        $new_tickets = Tickets::whereHas('status', function ($q){
            $q->where('name', 'New');
        })->get();

        // Fetch tier two users to escalate to
        $users = User::whereHas('tier', function ($q){
            $q->where('tier_name', 'Tier-Two');
        })->get();

        //Loop through each ticket found and escalate
        foreach ($new_tickets as $ticket)
        {
            try
            {
                if (now()->diff($ticket->created_at)->i > 15)
                {
                    // Send to all tier twos
                    foreach ($users as $user)
                    {
                        Mail::to($user->email)->send(new EscalationMail($ticket));
                    }
                    Log::info('Success');
                }
            }
            catch (\Exception $e)
            {
                Log::error($e);
            }
        }


//        return Command::SUCCESS;
    }
}
