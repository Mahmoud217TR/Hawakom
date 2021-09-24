<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Reqattchments;
use App\Models\Reqperiod;

class Resrequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'site',
        'number_of_rooms',
        'fare',
        'min',
        'max',
        'extra',
        'user_id',
        'rating',
        'visible',
        'available',
        'taken_by',
    ];
    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function getowner(){
        return User::find($this->user_id);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function getpics(){
        return Reqattchments::where('resrequest_id','=',$this->id)->get();
    }

    public function getperiods(){
        return Reqperiod::where('resrequest_id','=',$this->id)->get();
    }
}
