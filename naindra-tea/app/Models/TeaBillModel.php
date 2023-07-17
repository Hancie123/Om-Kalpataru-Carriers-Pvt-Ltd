<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeaBillModel extends Model
{
    use HasFactory;
    protected $table="tea_bills";
    protected $primarykey="teabill_id";
    protected $fillable = ['date', 'tea_kg', 'wage_kg', 'wage_amount', 'ot_amount'];

}
