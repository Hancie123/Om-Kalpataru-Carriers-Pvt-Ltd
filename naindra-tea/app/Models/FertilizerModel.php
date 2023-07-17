<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerModel extends Model
{
    use HasFactory;
    protected $table="fertilizer";
    protected $primaryKey="fertilizer_id";
}
