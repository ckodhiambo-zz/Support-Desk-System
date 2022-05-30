<?php

namespace App\Jobs;

use App\Models\Tickets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckEscalationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Tickets::query()->get()->map(function (Tickets $tickets) {
            $timestamps = $tickets->timestamps()->latest()->limit(2)->get();
            if ($timestamps->count()===0) {
                echo "Ticket has not been assigned";
            } elseif (data_get($timestamps, '0.new_status') === 'New' && data_get($timestamps, '1.new_status') === 'New') {
                echo "Ticket has not been opened";
            }
        });
    }
}
