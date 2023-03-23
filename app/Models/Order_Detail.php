<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order_Detail extends Model
{
    use HasFactory;

    public $primarykey = 'id';
    protected $table = 'order_details';
    public $timestamps = false;

    protected $fillable = [
        'item_name',
        'item_price',
        'item_quentity',
        'item_id',
        'order_id',
        'user_id',
    ];

    public function order() : BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_id');
    }

    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function item() : BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'item_id');
    }
}
