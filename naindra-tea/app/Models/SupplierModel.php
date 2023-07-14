<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;
    protected $table="tea_suppliers";
    protected $primaryKey="supplier_id";

    public function tearecord(){
        return $this->belongsTo(TeaModel::class);
    }
}