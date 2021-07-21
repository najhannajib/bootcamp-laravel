<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kedai extends Model
{
    use HasFactory;

    public function telefons()
    {
        return $this->hasMany(Telefon::class);
    }
}
