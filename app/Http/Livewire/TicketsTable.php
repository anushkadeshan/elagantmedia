<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsTable extends Component
{
    use WithPagination;
    public $query='';

    public function updatedQuery(){
        $this->render();
    }

    public function render()
    {

        if($this->query!==''){
            $tickets = Ticket::where('customer_name', 'like' ,'%'.$this->query.'%')->paginate(5);
        }
        else{
            $tickets = Ticket::paginate(5);
        }

        return view('livewire.tickets-table',[
            'tickets' => $tickets,
        ]);
    }
}
