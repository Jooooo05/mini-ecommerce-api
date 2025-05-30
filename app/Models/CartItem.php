<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
    ];

    // Relasi to User (many-to-one)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi to Item (many-to-one)
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
