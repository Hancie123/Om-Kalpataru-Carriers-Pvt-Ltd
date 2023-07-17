<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChemicalExpensesModel extends Model
{
    use HasFactory;
    protected $table="chemicalexpenses";
    protected $primaryKey="chemicalexpenses_id";
}
