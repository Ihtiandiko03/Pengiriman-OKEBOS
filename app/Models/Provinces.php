<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;

    // protected $fillable = ['province_name', 'province_name_en', 'province_code'];

    protected $table = 'db_province_data';
}
