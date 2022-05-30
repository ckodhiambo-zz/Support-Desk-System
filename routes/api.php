<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function (Request $request) {

//    return config('imap');

    /** @var \Webklex\PHPIMAP\Client $client */
    $client = Webklex\IMAP\Facades\Client::account('gmail');

//Connect to the IMAP Server
    $client->connect();

//Get all Mailboxes
    /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
    $folders = $client->getFolders();

//Loop through every Mailbox
    /** @var \Webklex\PHPIMAP\Folder $folder */
    foreach ($folders as $folder) {

        //Get all Messages of the current Mailbox $folder
        /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */
        $messages = $folder->messages()->limit(5)->all()->get();

        /** @var \Webklex\PHPIMAP\Message $message */
        foreach ($messages as $message) {
//            if (\Illuminate\Support\Str::endsWith($message->sender ,['centum.co.ke','safaricom.co.ke'])){
//
//            }
            echo $message->getSubject() . '<br />';
//            echo 'Attachments: '.$message->getAttachments()->count().'<br />';
            echo $message->getHTMLBody();

            //Move the current Message to 'INBOX.read'
            if ($message->move('INBOX.read') == true) {
                echo 'Message has been moved';
            } else {
                echo 'Message could not be moved';
            }
        }
    }

});

