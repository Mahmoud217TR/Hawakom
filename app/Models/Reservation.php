<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resort;
use App\Models\User;
use App\Models\Period;


class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'resort_id',
        'start_date',
        'end_date',
        'number_of_people',
        'rating',
        'name',
        'status',
        'site',
    ];

    public function getcustomer(){
        return User::find($this->customer_id);
    }

    public function getresort(){
        return Resort::find($this->resort_id);
    }
    
    public function getperiod(){
        return Period::find($this->period_id);
    }

    public static function getmostwanted(){
        return Resort::orderBy(Reservation::where('resort_id')->where('status','!=','canceled')->count(),'DESC')->take(10)->get();
    }
}
