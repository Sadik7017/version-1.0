<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'name',
        'email',
        'contact_number',
        'organization_id',
        'preferred_language'
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
