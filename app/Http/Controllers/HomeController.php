<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Webklex\IMAP\Facades;

class HomeController extends Controller
{

    private $currentConfig = [
        'username'      => 'mouayyad.taja.job@gmail.com',
        'password'      => 'khbcdxjokrlrexaj'
    ];

    /**
     * Connect to server.
     *
     * @return \Webklex\PHPIMAP\Client $client
     * @throws ConnectionFailedException
     */
    private function getCurrentClient()
    {
        /** @var \Webklex\PHPIMAP\Client $client */
        // $client = Facades\Client::account('default');

        $client = Facades\Client::make($this->currentConfig);

        //Connect to the IMAP Server
        $client->connect();

        return $client;
    }

    function index(Request $request, $path = null)
    {
        $client = $this->getCurrentClient();

        //Get all Mailboxes
        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
        $folders = $client->getFolders();

        if ($path) {
            //get specific folder
            $folder = $client->getFolderByPath($path);
        } else {
            //get specific folder
            $folder = $folders->first();
            $path = $folder->path;
        }

        //Get all Messages of the current Mailbox $folder
        /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */
        $messages = $folder->messages()->all()->fetchOrderDesc()->paginate(10);

        $data['paginator'] = $messages;
        $data['folders'] = $folders;
        $data['current_folder'] = $path;
        $data['username'] = $client->username;
        return view('message_table', $data);
    }


    function composeForm(Request $request)
    {

        $client = $this->getCurrentClient();

        //Get all Mailboxes
        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
        $folders = $client->getFolders();

        $data['folders'] = $folders;
        $data['current_folder'] = null;

        return view('compose_mail', $data);
    }

    function compose(SendMailRequest $request)
    {
        $config = $this->currentConfig;

        $data = $request->validated();

        Mail::send(new MailTemplate($data, $config));

        return back()->with('success', 'The mail has been sent successfully.!');
    }
}
