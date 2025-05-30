<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'price', 'description'];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
