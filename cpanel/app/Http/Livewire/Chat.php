<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Chat as BaseChat;

class Chat extends Component
{
    public $converesations, $currentParticipation;
    public function render()
    {
        $conversations = BaseChat::conversations()->setParticipant(auth()->user())->conversation->all();
        dd($conversations);
        return view('pages.chat.all',compact('conversations'));
    }

    public function mount()
    {


    }

    public function createConv(User $participation)
    {

        $conversation = BaseChat::conversation(BaseChat::conversation()->conversation)->makePrivate();
    }
}
