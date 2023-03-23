<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'total_item',
        'order_status',
        'payment_status',
        'order_payment_method',
        'total_amount',
        'order_position',
        'user_id',
        'order_person_name',
        'order_person_mobile',
        'order_total_person',
        'order_table_no',
        'order_contact_name',
        'order_contact_mobile',
        'order_contact_address',
    ];

    public function order_details() : HasMany
    {
        return $this->hasMany(Order::class, 'category_id', 'id');
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}
