<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item_Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'item_price',
        'item_price_status',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
