<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Ticket;
use Livewire\Component;
use App\Notifications\TicketAnswered;

class TicketView extends Component
{
    public $ticket = [];
    public $status;
    public $message;
    public $ticket_id;

    public function mount($ticket){
        $this->ticket = $ticket;
        $this->status = $ticket->status;
        $this->ticket_id = $ticket->id;
    }

    public function save(){
        $this->validate([
            'message' => 'required',
        ]);

        $ticket = Ticket::find($this->ticket_id);
        $ticket->status = $this->status;
        $ticket->save();

        $message = new Message(['message' => $this->message]);
        $ticket->messages()->save($message);
        (new TicketAnswered($ticket))->toMail($ticket->email);

        $this->mount($ticket);
        session()->flash('message', 'Ticket Answered successfully.');
    }


    public function render()
    {
        return view('livewire.ticket-view');
    }
}
