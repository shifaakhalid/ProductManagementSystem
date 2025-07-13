<?php


namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class FreeTrial extends Authenticatable
{
    protected $table = 'free_trials';

    protected $fillable = [
        'name', 'email', 'business_name', 'business_email', 'business_password'
    ];

    protected $hidden = ['business_password'];

    public function getAuthPassword()
    {
        return $this->business_password;
    }
}
