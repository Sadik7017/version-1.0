<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'mobile', 'password'];
    // protected $fillable = ['name', ' ']

    protected $hidden = ['password'];
}
