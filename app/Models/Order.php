<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        return $this->hasMany(Order_Detail::class, 'order_id', 'id');
    }

    public function cancelRequest() : HasOne
    {
        return $this->hasOne(OrderCancelRequest::class, 'order_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}
