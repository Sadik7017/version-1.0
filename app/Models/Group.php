<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    // Fillable fields allow mass assignment (like in form submissions)
    protected $fillable = ['name', 'description'];

    // Relationship: A group can have many users
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
