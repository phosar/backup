<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Invoice;
use App\Order;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'user_id';
    protected $table = 'users';
    protected $casts = ['user_id' => 'string'];
    public $incrementing = false;
    
    protected $fillable = [
        'user_id', 'user_name', 'user_email', 'user_password', 'user_tel_h', 'user_tel_w', 'user_addr', 'user_gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'remember_token',
    ];

    /*
    public function username () {
        return 'user_email';
    }
    
    public function getEmailAttribute() {
        return $this->attributes['user_email'];
    }
    
    public function setEmailAttribute($value) {
        $this->attributes['user_email'] = $value;
    }
    */
    public function getAuthPassword () {
        return $this->user_password;
    }
    
    
    // user has many order 
    public function orders(){
        return $this->hasMany(Order::class);
    }
    // user has many invoices
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
