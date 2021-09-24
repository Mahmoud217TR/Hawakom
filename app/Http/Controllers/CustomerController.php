<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resrequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Resort;
use App\Models\Reservreq;
use App\Models\Reservation;
use App\Models\Period;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','customer']);
    }

    
    public function reqresortshow($id)
    {
        
        $r = Resort::findOrFail($id);
        return view('customers.request',["res"=>$r]);
    }

    public function showmyres($id)
    {
        $user = User::findOrFail($id);
        if(auth()->user()->id != $user->id){
            abort(403);
        }else{
            return view('customers.myres',["user"=>$user]);
        }
        return view('customers.myres',["user"=>$user]);
    }

    public function showmycurrentres($id)
    {
        $user = User::findOrFail($id);
        if(auth()->user()->id != $user->id){
            abort(403);
        }else{
            return view('customers.mycres',["user"=>$user]);
        }
    }

    public function rateshow($id){
        $r = Reservation::findOrFail($id);
        $u = auth()->user();

        if($u->id != $r->customer_id){
            abort(403);
        }else{
            return view('customers.rate',["res"=>$r]);
        }
        
    }
    

    // Functions
    
    public function reqresort($id)
    {
        $r = Resort::findOrFail($id);
        $u = auth()->user();
        
        $rsr = new Reservreq;
        $p = Period::find(request('period'));

        $rsr -> customer_id = $u->id;
        $rsr -> name = $u->name;
        $rsr -> resort_id = $r->id;
        $rsr -> period_id = $p->id;
        $rsr -> start_date = $p->start_date;
        $rsr -> end_date = $p->end_date;
        $rsr -> number_of_people = request('number_of_people');
        

        $rsr ->save();

        return redirect('/');
    }

    public function gback($id){
        $r = Reservation::findOrFail($id);
        $u = auth()->user();

        if($u->id != $r->customer_id){
            abort(403);
        }else{
            $r -> status = 'delivered';
            $r ->save();
            return redirect('/rateshow/'.$id);
        }
        
    }

    public function cancel($id){
        $r = Reservation::findOrFail($id);
        $u = auth()->user();

        if($u->id != $r->customer_id){
            abort(403);
        }else{
            $p = Period::find($r->period_id);
            $p->available = true;
            $p->save();
            $r -> status = 'canceled';
            $r ->save();
            return redirect('/mycurrentres/'.$u->id);
        }
        
    }

    public function rate(){
        $id = request('res_id');
        $r = Reservation::findOrFail($id);
        $u = auth()->user();

        if($u->id != $r->customer_id){
            abort(403);
        }else{
            $r->rating = request('rating');
            $r->save();
            return redirect('/mycurrentres/'.$u->id);
        }
        
    }
}
