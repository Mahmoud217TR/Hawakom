<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Resort;
use App\Models\Vioreport;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function categories()
    {
        return view('categories');
    }

    public function cate_show($id)
    {
        $category = Category::findOrFail($id);
        return view('cate_show',['category' => $category]);
    }
    
    public function search()
    {
        $search = request()->input('search');

        $categories = Category::where('name','LIKE',"%{$search}%")->orWhere('desc','LIKE',"%{$search}%")->get();
        if(!auth()->guest() && auth()->user()->user_type == 'admin'){
            $resorts = Resort::where('site','LIKE',"%{$search}%")->orWhere('extra','LIKE',"%{$search}%")->get();
        }else{
            $resorts = Resort::where('visible','=',true)->where('site','LIKE',"%{$search}%")->orWhere('extra','LIKE',"%{$search}%")->get();
        }
        
        $users = User::where('name','LIKE',"%{$search}%")->orWhere('email','LIKE',"%{$search}%")->get();
        
        return view('search',['categories' => $categories,'resorts' => $resorts,'users' => $users]);
    }

    public function resshow($id)
    {
        $res = Resort::findOrFail($id);
        if(auth()->guest() && $res->visible == false){
            abort(403);
        }else if (auth()->guest()){
            return view('resshow',['res' => $res]);
        }else if (auth()->user()->user_type != 'admin' && $res->visible == false){
            abort(403);
        }else{
            return view('resshow',['res' => $res]);
        }
    }

    public function mostvisitedshow()
    {
        return view('mostvres');
    }

    public function reportshow()
    {
        return view('report');
    }
    public function reportsub()
    {
        $report = new Vioreport;
        $report -> title = request('title');
        $report -> name = request('name');
        $report -> desc = request('desc');
        $report -> phone = request('phone');
        $report -> email = request('email');
        $report -> veiwed = false;
        if(request()->has('uid')){
            $report -> uid = request('uid');
        }
        $report->save();
        return redirect('/');
    }
}
