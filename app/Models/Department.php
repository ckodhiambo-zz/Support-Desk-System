<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['department_name','company_id'];

    public function company():BelongsTo
    {
        return $this->belongsTo(Companies::class);
    }

    public function users():HasMany
    {
        return $this->HasMany(User::class);
    }
}
