<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Employees';
    protected $primaryKey = "EmployeeID";
    public $timestamps = false;
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $attributes = ['EmployeeID', 'LastName', 'FirstName', 'Title', 'TitleOfCourtesy', 'BirthDate', 'HireDate', 'Address', 'City', 'Region', 'PostalCode', 'Country', 'HomePhone', 'Extension', 'Photo', 'Notes', 'ReportsTo', 'PhotoPath', 'Salary'];

    public function boss(){
        return $this->belongsTo(Employee::class, "ReportsTo");
    }

    public function immediate_responsibles(){
        return $this->hasMany(Employee::class, 'ReportsTo', 'EmployeeID');
    }

    private function recursiveSearch($key1, $key2)
    {
        return $this->hasMany($this, $key1, $key2);
    }

    public function bosses()
    {
        return $this->recursiveSearch('EmployeeID', 'ReportsTo')->with('bosses');
    }

    public function subordinates()
    {
        return $this->recursiveSearch('ReportsTo', 'EmployeeID')->with('subordinates');
    }
}
