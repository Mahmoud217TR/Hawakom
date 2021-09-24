<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resrequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Resort;
use App\Models\Reservreq;
use App\Models\Reservation;
use App\Models\Reqattchments;
use App\Models\Reqperiod;
use App\Models\Period;

class OwnerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','owner']);
    }

    public function addsiteshow()
    {
        return view('owners.add');
    }

    public function myresshow($id)
    {
        $user = User::findOrFail($id);
        if(auth()->user()->id != $user->id){
            abort(403);
        }else{
            return view('owners.myres',['user'=>$user]);
        }
    }

    public function myresreqshow($id,$idr)
    {
        $user = User::findOrFail($id);
        $resort = Resort::findOrFail($idr);
        if(auth()->user()->id != $user->id){
            abort(403);
        }else{
            return view('owners.requests',['user'=>$user,'resort'=>$resort]);
        }
        
    }

    public function reseditshow($id)
    {
        $resort = Resort::findOrFail($id);
        if(auth()->user()->id != $resort->user_id){
            abort(403);
        }else{
            return view('owners.edit',['res'=>$resort]);
        }
        
    }

    public function addperiodsshow($id,$num)
    {
        $res = Resrequest::findOrFail($id);
        if(auth()->user()->id != $res->user_id){
            abort(403);
        }else{
            return view('owners.periods',['res_id'=>$res->id,'num'=>$num]);
        }
    }

    public function editperiodsshow($id)
    {
        $res = Resort::findOrFail($id);
        if(auth()->user()->id != $res->user_id){
            abort(403);
        }else{
            return view('owners.editperiods',['res'=>$res]);
        }
    }

    // Functions

    public function addsite()
    {
        $rr = new Resrequest;
        $rr->site = request('site');
        $rr->number_of_rooms = request('number_of_rooms');
        $rr->fare = request('fare');
        $rr->extra = request('extra');
        $rr->user_id = auth()->user()->id;
        $rr->visible = true;

        $rr->save();

        if(request()->has('pic')){
            foreach(request('pic') as $pic){
                $tmpat = new Reqattchments;
                
                // Making unique name
                $picname = md5($pic->getClientOriginalName(). time());
                // Adding ext
                $fullpicname = $picname.'.'.$pic->getClientOriginalExtension();
                // Saving the pictures in the Project Filrs
                $pic->move(public_path("\storage\uploads"), $fullpicname);
                // Making Url
                $tmpat->url = "uploads/". $fullpicname;

                $tmpat->resrequest_id = $rr->id;
                $tmpat->save();
            }
        }


        $u = User::find($rr->user_id);
        $rr->owner()->associate($u);

        if(request()->has('cates')){
            foreach(request('cates') as $c){
                $cate = Category::find($c);
                $rr->categories()->attach($cate);
            }
        }

        $path = '/addperiodsshow/'.$rr->id.'/'.request('num');
        
        return redirect($path);
    }

    public function reqacc($id)
    {
        $path = '/myresshow/'.auth()->user()->id;

        $rs = new Reservation;
        $rstmp = Reservreq::findOrFail($id);

        $rs -> customer_id = $rstmp ->customer_id;
        $rs -> name = $rstmp ->name;
        $rs -> resort_id = $rstmp ->resort_id;
        $rs -> start_date = $rstmp ->start_date;
        $rs -> end_date = $rstmp ->end_date;
        $rs -> number_of_people = $rstmp ->number_of_people;
        $rs -> period_id = $rstmp ->period_id;
        $rs -> status = 'pending';
        $rs -> name = User::find($rstmp ->customer_id)->name;
        $rs -> site = Resort::find($rstmp ->resort_id)->site;

        $rs->save();
        $rstmp->delete();


        foreach(Reservreq::where('period_id','=',$rs ->period_id)->get() as $rsd){
            $rsd->delete();
        }
        
        $p = Period::find($rs->period_id);
        $p -> available = false;
        $p -> save();

        return redirect($path);
    }

    public function reqden($id)
    {
        $path = '/myresshow/'.auth()->user()->id;
        Reservreq::findOrFail($id)->delete();
        return redirect($path);
    }

    public function resdel($id)
    {
        $path = '/myresshow/'.auth()->user()->id;
        $resort = Resort::findOrFail($id);
        if(auth()->user()->id != $resort->user_id){
            abort(403);
        }else{
            Resort::findOrFail($id)->delete();
            return redirect($path);
        }
    }

    public function resedit($id)
    {
        $path = '/myresshow/'.auth()->user()->id;
        $resort = Resort::findOrFail($id);
        if(auth()->user()->id != $resort->user_id){
            abort(403);
        }else{
            
            $res = Resort::findOrFail($id);            
            $res->site = request('site');
            $res->number_of_rooms = request('number_of_rooms');
            $res->fare = request('fare');
            $res->extra = request('extra');            
            $res->save();
            $tmp = request('cates');
            if(is_null($tmp)){
                foreach($res->categories as $c){
                    $res->categories()->detach($c);
                }
            }else{
                foreach($res->categories as $c){
                    if(!in_array($c->id,$tmp)){
                        $res->categories()->detach($c);
                    }
                }
                foreach(request('cates') as $c){
                    $cate = Category::find($c);
                    if(!$res->iscate($cate->id)){
                        $res->categories()->attach($cate);
                    }
                }
            }

            return redirect($path);
        }
    }

    public function addperiods()
    {
        $rr = Resrequest::findOrFail(request('resrequest_id'));

        $num = request('num');

        for($i = 1 ; $i <= $num ; $i++){
            $p = new Reqperiod;
            $p->resrequest_id = $rr->id;
            $p->start_date = request('s_date'.$i);
            $p->end_date = request('e_date'.$i);
            $p->save();
        }

        return redirect('/');
    }

    public function editperiods()
    {
        
        $r = Resort::findOrFail(request('resort_id'));
        foreach($r->getperiods() as $p){
            $p-> start_date = request('s_date'.$p->id);
            $p-> end_date = request('e_date'.$p->id);
            $p->save();
        }
        return redirect('/reseditshow/'.request('resort_id'));
    }
    
    public function addeditperiods()
    {
        $p = new Period;
        $p-> start_date = request('s_date');
        $p-> end_date = request('e_date');
        $p-> resort_id = request('resort_id');
        $p->available = true;
        $p-> save();
        return redirect('/editperiodsshow/'.request('resort_id'));
    }

    public function delperiod($id)
    {
        $p = Period::findOrFail($id);
        $path = '/editperiodsshow/'.$p->resort_id;
        $p->delete();
        return redirect($path);
    }

}
