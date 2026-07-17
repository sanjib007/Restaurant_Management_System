<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
    ];

    /**
     * Determine whether the user has any of the given role(s).
     *
     * @param  string|array<int, string>  $roles
     */
    public function hasRole($roles): bool
    {
        return $this->roles->pluck('name')->intersect((array) $roles)->isNotEmpty();
    }

    /**
     * Admin-level users for UI/dashboard purposes. Super admins are treated
     * as admins everywhere so they get the full admin experience.
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(['admin', 'super_admin']);
    }

    public function hasPermissionTo(string $permissionName): bool
    {
        if ($this->roles()->whereHas('permissions', fn ($query) => $query->where('name', $permissionName))->exists()) {
            return true;
        }

        return $this->roles()->where('name', 'super_admin')->exists();
    }

    public function hasAnyPermission(array $permissionNames): bool
    {
        foreach ($permissionNames as $permissionName) {
            if ($this->hasPermissionTo($permissionName)) {
                return true;
            }
        }

        return false;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }
    
    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    // public function authorizeRoles($roles)
    // {
    //     if ($this->hasAnyRole($roles)) {
    //         return true;
    //     }
    //     abort(401, 'This action is unauthorized.');
    // }
    // public function hasAnyRole($roles)
    // {
    //     if (is_array($roles)) {
    //         foreach ($roles as $role) {
    //         if ($this->hasRole($role)) {
    //             return true;
    //         }
    //         }
    //     } else {
    //         if ($this->hasRole($roles)) {
    //         return true;
    //         }
    //     }
    //     return false;
    // }
    // public function hasRole($role)
    // {
    //     if ($this->roles()->where('name', $role)->first()) {
    //         return true;
    //     }
    //     return false;
    // }
}
