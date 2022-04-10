<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
//        'user_id',
        'company_name',
//        'company_address',
//        'company_phone',
//        'country',
//        'logo'
    ];
    protected $guarded = [];

    public function users():HasMany
    {
        return $this->hasMany(User::class, 'company_id');
    }
}
