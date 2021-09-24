<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resort;
use App\Models\Resrequest;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
    ];

    public function resorts(){
        return $this->belongsToMany(Resort::class);
    }

    public function resrequests(){
        return $this->belongsToMany(Resrequest::class);
    }
}
