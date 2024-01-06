<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CorporateUser extends Authenticatable
{


    protected $table = 'corporate_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
        'email',
        'password',
        'registration_form',
        'proof_of_payment',
        'industry',
        'region',
        'contact_number',
        'fax_number',
        'website',
        'products_offered',
        'no_employees',
        
    ];

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
        'password' => 'hashed',
    ];

    // public function roles() {
    //     return $this->belongsToMany(Role::class, 'user_roles');
    // }

    // public function hasRole($role) {
    //     return 
}
