@extends('layouts.app')

@section('content')
<div class="container" style ="min-height:70vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-9 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-3 pr-0 pl-5 float-right">
                            {{ __('نتائج البحث') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-9 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-3 pr-0 pl-5 float-right">
                            <h3>المصايف</h3>
                        </div>
                    </div>
                    <br>
                    @foreach($resorts as $r)
                    <div class="row">
                        <div class="col-md-8 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-4 pr-0 pl-5 float-right">
                            <a href= '/resshow/{{$r->id}}'>{{$r->site}}</a>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-9 float-right" style ="color:transparent">
                            {{ __('  ') }}
                        </div>
                        <div class="col-md-3 pr-0 pl-5 float-right">
                            <h3>التصنيفات</h3>
                        </div>
                    </div>
                    <br>
                    @foreach($categories as $c)
                    <div class="row">
                        <div class="col-md-8 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-4 pr-0 pl-5 float-right">
                            <a href= '/cate_show/{{$c->id}}'>{{$c->name}}</a>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-9 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-3 pr-0 pl-5 float-right">
                            <h3>الأشخاص</h3>
                        </div>
                    </div>
                    <br>
                    @foreach($users as $u)
                    <div class="row">
                        <div class="col-md-8 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-4 pr-0 pl-5 float-right">
                            <a href= '/profile/{{$u->id}}'>{{$u->name}}</a>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
