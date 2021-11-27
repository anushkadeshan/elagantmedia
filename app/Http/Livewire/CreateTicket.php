<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Notifications\TicketCreated;

class CreateTicket extends Component
{
    public $customer_name;
    public $problem_description;
    public $phone;
    public $email;

    public function save(){
        $this->validate([
            'email' => 'required|email',
            'problem_description' => 'required',
            'customer_name' => 'required',
            'phone' => 'required',
        ]);

        $ticket = Ticket::create([
            'email' => $this->email,
            'reference_no' => Str::random(10),
            'problem_description' => $this->problem_description,
            'customer_name' => $this->customer_name,
            'phone' => $this->phone,
            'status' => 'pending'
        ]);

        (new TicketCreated($ticket))->toMail($ticket->email);


        session()->flash('message', 'Ticket created successfully.');
        $this->clear();
    }

    public function clear(){
        $this->customer_name = '';
        $this->problem_description = '';
        $this->phone = '';
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.create-ticket');
    }
}
