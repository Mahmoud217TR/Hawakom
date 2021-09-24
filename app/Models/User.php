<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Resort;
use App\Models\Resrequest;
use App\Models\Reservation;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'user_type',
        'owner_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function resorts(){
        return $this->hasMany(Resort::class);
    }

    public function getresorts($id){
        return Resort::where('user_id','=',$id)->get();
    }

    public function resrequests(){
        return $this->hasMany(Resrequest::class);
    }

    public function reservations(){
        $tmp = Reservation::where('customer_id','=',$this->id)->get();
        return $tmp;
    }

    public function getmycurrentres(){
        $tmp = Reservation::where('customer_id','=',$this->id)->where('status','=','pending')->get();
        return $tmp;
    }
}
