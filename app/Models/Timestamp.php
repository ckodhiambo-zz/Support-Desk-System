<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timestamp extends Model
{
    use HasFactory;

    public function tickets():BelongsTo
    {
        return $this->belongsTo(Tickets::class);
    }
    public function Nabotickets():BelongsTo
    {
        return $this->belongsTo(NaboTickets::class);
    }
}