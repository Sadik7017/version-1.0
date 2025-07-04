<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'group_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // User belongs to a Group
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
