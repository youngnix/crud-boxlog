<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['recipient', 'address', 'status'];
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
}
