<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Vioreport extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'email',
        'title',
        'desc',
        'phone',
        'name',
        'veiwed',
    ];

    public function getuser(){
        if(is_null($this->uid)){
            return "no uid";
        }else{
            return User::find($this->uid);
        } 
    }
}
