<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeesmodel extends Model
{
    use HasFactory;
    protected $table="employees";
    protected $primaryKey="Employees_ID";

    public function teabill(){
        return $this->belongsTo(TeaBillModel::class);
    }

    public function employees(){
        return $this->belongsTo(TeaBillModel::class);
    }
}