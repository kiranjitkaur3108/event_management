<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     * Include 'role' so we can store admin/user role.
     */
   protected $fillable = [
    'name',
    'email',
    'password',
    'role',
    'profile_image',
];



    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Mutator to automatically hash passwords when creating/updating.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


    /**
     * Check if the user is admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }


    /**
     * Check if the user is regular user
     */
    public function isUser()
    {
        return $this->role === 'user';
    }
    public function bookings()
{
    return $this->hasMany(Booking::class);
}

}