<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    var $pusher;
    var $user;
    var $chatChannel;

    const DEFAULT_CHAT_CHANNEL = 'presence-chat';

    public function __construct()
    {
        $this->pusher = App::make('pusher');
        $this->chatChannel = self::DEFAULT_CHAT_CHANNEL;
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Conversation::all();
        htmlspecialchars_decode($messages);
        $messages->toJson();
        //ChromePhp::log($messages->jsonSerialize()); //PHP debug for Chrome

        return view('home', ['chatChannel' => $this->chatChannel, 'messages' => $messages]);
    }

    public function postMessage(Request $request){
        $socketId = $request->input('socket_id');
        $message = [
            'text' => e($request->input('chat_text')),
            'username' => Auth::user()->name,
            'timestamp' => (time()*1000)
        ];

        $conversation = new Conversation();
        $conversation->name = Auth::user()->name;
        $conversation->message = $message['text'];
        $conversation->save();

        $this->pusher->trigger($this->chatChannel, 'new-message', $message, $socketId);
    }

    public function postAuth(){
//        return $this->pusher->socket_auth($_POST['channel_name'], $_POST['socket_id']);
        $presence_data = ['name' => Auth::user()->name];
        return $this->pusher->presence_auth($_POST['channel_name'], $_POST['socket_id'], Auth::id(), $presence_data);

    }
}
