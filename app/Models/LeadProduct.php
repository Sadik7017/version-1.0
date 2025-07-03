<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeadProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'product_name',
        'quantity',
        'price',
        'amount',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
