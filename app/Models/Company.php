<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tbl_companies";

    public static function getAll()
    {
        $companies = Company::orderBy('name', 'ASC')->get();

        return $companies;
    }
}
