<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class web extends Model
{
    protected $fillable = ['domain', 'url', 'description'];
    use HasFactory;
}
