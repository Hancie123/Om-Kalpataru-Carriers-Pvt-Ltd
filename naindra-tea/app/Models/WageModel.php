<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WageModel extends Model
{
    use HasFactory;
    protected $table="wage";
    protected $primaryKey="wage_id";
}