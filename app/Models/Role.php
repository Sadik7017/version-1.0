<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends SpatieRole
{
    protected $fillable = [
        'name',
        'guard_name',
        'description', // Ensure this is in your roles table
    ];

    /**
     * Optional: Get users that have this role
     */
    // public function users(): HasMany
    // {
    //     return $this->hasMany(User::class);
    // }
}
