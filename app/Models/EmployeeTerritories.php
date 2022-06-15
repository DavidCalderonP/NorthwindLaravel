<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeTerritories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'EmployeeTerritories';
    protected $fillable = ['EmployeeID', 'TerritoryID'];
}
