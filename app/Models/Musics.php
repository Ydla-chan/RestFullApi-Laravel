<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musics extends Model
{
    use HasFactory;
    protected $table = 'musics';
    protected $fillable = ['title', 'artist','producer', 'release_date', 'created_at', 'updated_at'];
}
