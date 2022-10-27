<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $ableToChatWith;
    public function render()
    {
        return view('pages.chat.all');
    }

    public function mount()
    {

        $grade = auth()->user()->teacher->grade;

        $this->ableToChatWith = collect($grade->teachers)->merge(collect($grade->students));
    }
}
