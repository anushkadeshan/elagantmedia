<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $fillable = [
        'customer_name',
        'reference_no',
        'problem_description',
        'customer_name',
        'email',
        'phone',
        'status',
        'tikcet_closed_at',
    ];

    /**
     * Get all of the comments for the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'ticket_id');
    }
}
