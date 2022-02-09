<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, softDeletes};

class Camp extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['title', 'price'];
}
