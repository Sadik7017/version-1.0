<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Mail\Mailables\Content;
use App\Models\LeadProduct;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'source',
        'expected_close_date',
        'type',
        'sales_owner',
        'lead_value',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'sales_owner');
    }

    public function contact()
    {
        return $this->hasOne(Content::class);
    }

    public function products()
    {
        return $this->hasMany(LeadProduct::class);
    }
}
