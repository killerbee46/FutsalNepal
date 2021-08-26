<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Futsal extends Model
{
    use HasFactory;
    protected $table = [
        "futsal_name",
        "owner_name",
        "contact",
        "email",
        "city",
        "area",
        "map"
    ];
}
