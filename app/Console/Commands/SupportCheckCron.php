<?php

namespace App\Console\Commands;

use App\Mail\NewUserEmailAlertMail;
use App\Mail\RequesterFirstNotification;
use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Webklex\IMAP\Facades\Client;

class SupportCheckCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'support:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check support email for new issue';

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
//        return Command::SUCCESS;
        try {
            $client = Client::account('gmail');

            $client->connect();

            $folder = $client->getFolder('INBOX');

            // Generates a collection
            $message = $folder->query()
                //an array of domains
                ->from('/@tierdata.co.ke$/', '/@nabocapital.com$/')
                //run cron job every minute.
                ->since(now()->subDay())
                ->unseen()
                ->markAsRead()
                ->get();

//            Log::info(print_r($message));
            foreach ($message as $email) {
                $user_email = $email->getFrom()[0]->mail;
                $user_name = $email->getUsername();
                $user_sender = $email->getSender();
                $user_subject = $email->getSubject();
                $user_content = $email->getTextBody();

                $newUser = User::firstOrCreate([
                    'email' => $email->getFrom()[0]->mail,
                    'name' => data_get($email->getFrom(),'0.personal'),
                    'password' => 'secret'
                ]);

                $ticket = new Tickets([
                    'subject' => $user_subject,
                    'description' => $user_content,
                ]);

                $status = status::whereName('New')->first();
                $ticket->requester()->associate($newUser);
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
            }

            Mail::to($ticket->requester->email)->send(new NewUserEmailAlertMail($ticket));

            Mail::to($ticket->requester->email)->send(new RequesterFirstNotification($ticket));

            Log::info('Done');

        } catch (Exception $e) {
            Log::error($e);
        }

    }
}
