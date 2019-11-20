<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\User;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'invoice_id';
    // Invoice has a relation with an order 
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
