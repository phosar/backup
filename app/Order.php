<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Invoice;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    // relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // relationship with invoice 
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

}
