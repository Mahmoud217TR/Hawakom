<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Reservreq;
use App\Models\Attachment;
use App\Models\Reservation;
use App\Models\Period;


class Resort extends Model
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

    public function getrequests(){
        return Reservreq::where('resort_id','=',$this->id)->get();
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function getpics(){
        return Attachment::where('resort_id','=',$this->id)->get();
    }

    public function getcateids(){
        return $this->categories()->pluck('category_id');
    }

    public function getrating(){
        $sum = 0;
        $reservations = Reservation::where('resort_id','=',$this->id)->where('rating','<>',null)->get();
        $num = $reservations->count();
        foreach($reservations as $res){
            $sum += $res->rating;
        }
        if($num > 0){
            return $sum/$num;
        }else{
            return -1;
        }
        
    }

    public function availability(){
        $ps = Period::where('resort_id','=',$this->id)->where('available','=',true)->get();
        if($ps->count() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function iscate($cid){
        $cats = $this->categories()->pluck('category_id');
        
        if($cats->contains($cid)){
            return true;
        }else{
            return false;
        }
    }

    public function getresnum(){
        return Reservation::where('resort_id','=',$this->id)->count();
    }

    public function getperiods(){
        return Period::where('resort_id','=',$this->id)->get();
    }

    public function getavailaleperiods(){
        return Period::where('resort_id','=',$this->id)->where('available','=',true)->get();
    }

}
