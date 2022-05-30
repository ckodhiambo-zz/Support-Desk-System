<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
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

        try
        {
            $client = Client::account('gmail');

            $client->connect();

            $folder = $client->getFolder('INBOX');

            // Generates a collection
            $message = $folder->query()
//                ->from('*@centum.co.ke')
                ->from('/@gmail.com$/')
                ->since(now()->subHours(2))
                ->unseen()
//                ->markAsRead()
                ->get();

//            Log::info(print_r($message));

            foreach($message as $email)
            {
                $user_email = $email->getSender();

                $user_subject = $email->getSubject();

                $user_content = $email->getTextBody();

                Log::info($user_email);
                Log::info($user_subject);
                Log::info($user_content);
            }

            Log::info('Done');
        }
        catch(Exception $e)
        {
            Log::error($e);
        }

    }
}
