<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reqattchments extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'resrequest_id',
    ];

}
