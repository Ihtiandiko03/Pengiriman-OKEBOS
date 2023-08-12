<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }

    public function kurirdanagen()
    {

        return $this->hasMany(User::class);
    }
}
