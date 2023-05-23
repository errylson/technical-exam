<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tbl_employees";

    public static function getAll()
    {
        $employees = Employee::orderBy('first_name', 'ASC')->get();

        return $employees;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
