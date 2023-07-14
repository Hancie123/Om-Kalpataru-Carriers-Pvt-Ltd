<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeaModel extends Model
{
    use HasFactory;
    protected $table="tea_records";
    protected $primaryKey="tea_id";

    public function suppliermodel(){
        return $this->belongsTo(SupplierModel::class);
    }
}