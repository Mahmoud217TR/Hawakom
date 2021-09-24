<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reqperiod extends Model
{
    use HasFactory;
    protected $fillable = [
        'resrequest_id',
        'start_date',
        'end_date',
    ];
}
