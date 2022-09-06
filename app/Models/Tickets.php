<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tickets extends Model
{
    use HasFactory;

    protected $guarded = ['requester_id', 'channel_id', 'attachment', 'delegatee_id'];
    protected $fillable = ['subject','description','reopening_reason','reopening_status', 'admin_reason'];


    public function asset(): BelongsToMany
    {
        return $this->belongsToMany(Asset::class);
    }

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

    public function delegatee(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(Channel::class);
    }

    public function timestamps(): HasMany
    {
        return $this->hasMany(Timestamp::class);
    }

    public function reviews():HasMany
    {
        return $this->hasMany(Review::class);
    }

}
