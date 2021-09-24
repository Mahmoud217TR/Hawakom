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
                            {{ __('مصايفي') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class = "row container-fluid">
                        <div class="col-md-9 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-3 pr-0 pl-5 float-right">
                            <a href ="/addsiteshow"> اضافة مصيف</a>
                        </div>
                    </div>
                    <br>
                    <table class= "table">
                        @foreach($user->resorts->where('visible','=',true) as $r)
                        <tr>
                            <td class="col-3 d-inline-flex justify-content-end"><a href="/myresreqshow/{{$user->id}}/{{$r->id}}">طلبات التأجير</a></td>
                            <td class="col-3 d-inline-flex justify-content-end"><a href="/reseditshow/{{$r->id}}" style="color:green">تعديل المعلومات</a></td>
                            <td class="col-4 d-inline-flex justify-content-end"><a href="/resshow/{{$r->id}}">{{$r->site}}</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
