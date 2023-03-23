<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    public $primarykey = 'id';
    protected $table = 'items';
    public $timestamps = false;

    protected $fillable = [
        'item_name',
        'item_description',
        'item_image',
        'item_price',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function item_prices(): HasMany
    {
        return $this->hasMany(Item_Price::class);
    }

    public function order_details(): HasMany
    {
        return $this->hasMany(order_details::class);
    }
}
