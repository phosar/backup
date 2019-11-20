<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SupplementCategory;

class Supplement extends Model
{
    protected $table = 'supplements';
    protected $primaryKey = 'supplement_id';

    protected $fillable = ['supplement_name', 'supplement_price', 'supplement_description', 'supplement_pic', 'supplement_category_id', 'supplement_supplier_id'];
    // has relationship with supplement category
    public function supplementCategory()
    {
        return $this->belongsTo(SupplementCategory::class);
    }
    public function supplementSupplier()
    {
        return $this->belongsTo(SupplementCategory::class);
    }
}
