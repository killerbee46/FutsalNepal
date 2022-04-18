<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Futsal extends Model
{
    use HasFactory;
    protected $table = "futsal";

    protected $fillable =[
        "futsal_name",
        "owner_name",
        "image",
        "date",
        "contact",
        "email",
        "city",
        "area",
        "map"
    ];
}
