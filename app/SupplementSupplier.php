<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplementSupplier extends Model
{
    protected $table = 'supplement_suppliers';
    protected $primaryKey = 'supplier_id';

    protected $fillable = ['supplier_name', 'supplier_addr', 'supplier_phone', 'supplier_email'];
}
