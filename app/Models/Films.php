<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory; 
    protected $table = 'films';

    protected $fillable = ['title', 'director', 'producer', 'release_date', 'created_at', 'updated_at'];
}
