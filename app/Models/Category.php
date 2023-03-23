<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'categories';
    public $timestamps = false;

    protected $fillable = [
        'category_name',
        'category_description',
        'category_image',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'id');
    }
}
