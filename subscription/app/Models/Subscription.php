<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'billing_info' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
