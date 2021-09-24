<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Resrequest;
use App\Models\Resort;
use App\Models\User;
use App\Models\Attachment;
use App\Models\Vioreport;
use App\Models\Period;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function panel()
    {
        return view('admins.panel');
    }

    public function addcateshow()
    {
        return view('admins.catadd');
    }

    public function resreqshow()
    {
        return view('admins.resreq');
    }

    public function resreqfullshow($id)
    {
        $res = Resrequest::findOrFail($id);
        return view('admins.resreqshow',['res' => $res]);
    }
    
    public function showallres()
    {
        return view('admins.res');
    }

    public function reportshowing()
    {
        return view('admins.reports');
    }

    public function reportshowid($id)
    {
        $rep = Vioreport::findOrFail($id);
        $rep -> veiwed = true;
        $rep -> save();
        return view('admins.reportshow',['rep'=>$rep]);
    }

    // Functions

    public function addcat()
    {
        $check = Category::where("name","=",request('name'))->get();
        if($check->count() == 0){
            $c = new Category;
            $c->name = request('name');
            $c->desc = request('desc');
            $c->save();
        }
        return redirect('/categories');
    }

    public function resreqacc($id)
    {
        $rr = Resrequest::findOrFail($id);
        $r = new Resort;
        $r->site = $rr->site;
        $r->number_of_rooms = $rr->number_of_rooms;
        $r->fare = $rr->fare;
        $r->extra = $rr->extra;
        $r->user_id = $rr->user_id;
        $r->visible = $rr->visible;;
        $r->save();
        $u = User::find($r->user_id);
        $r->owner()->associate($u);

        foreach($rr->categories as $c){
            $cate = Category::find($c->id);
            $r->categories()->attach($cate);
        }

        foreach($rr->getperiods() as $pp){
            $p = new Period;
            $p->start_date = $pp->start_date;
            $p->end_date = $pp->end_date;
            $p->resort_id = $r->id;
            $p->available = true;
            $p->save();
        }

        foreach($rr->getpics() as $tmpat){
            $at = new Attachment;
            $at->url = $tmpat->url;
            $at->resort_id = $r->id;
            $at->save();
        }

        $rr->delete();
        
        return redirect('/adminspanel');;
    }

    public function resreqden($id)
    {
        $rr = Resrequest::findOrFail($id)->delete();
        return redirect('/adminspanel');
    }

    public function delreport($id)
    {
        $rr = Vioreport::findOrFail($id)->delete();
        return redirect('/reportshowing');
    }
    
    public function removeuser($id)
    {
        $u = User::findOrFail($id);
        if($u->id != auth()->user()->id && auth()->user()->user_type == 'admin'){
            $u->delete();
        }
        return redirect('/');
    }

    public function archiveres($id)
    {
        $r = Resort::findOrFail($id);
        $r-> visible =false;
        $r->save();
        return redirect('/resshow/'.$id);
    }

    public function unarchiveres($id)
    {
        $r = Resort::findOrFail($id);
        $r-> visible =true;
        $r->save();
        return redirect('/resshow/'.$id);
    }
    
    
}
