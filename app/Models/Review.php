<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'review_name',
        'review_text',
    ];
    
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}
