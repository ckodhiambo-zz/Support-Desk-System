<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class   Tickets extends Model
{
    use HasFactory;



    protected $guarded = ['status_id', 'requester_id'];



    public function asset(): BelongsToMany
    {
        return $this->belongsToMany(Asset::class);
    }

//    public function status(): BelongsToMany
//    {
//        return $this->belongsToMany(status::class);
//    }

    /////////////////////////////////////////

    public function status(): BelongsTo
    {
        return $this->belongsTo(status::class);
    }

    public function requester(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function solver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
