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
                            {{ $resort->site }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <br>
                    
                    <table class= "table">
                    <tr>
                    <th class="col-1 d-inline-flex justify-content-end">رفض</th>
                    <th class="col-1 d-inline-flex justify-content-end">قبول</th>
                    <th class="col-2 d-inline-flex justify-content-end">نهاية الحجز</th>
                    <th class="col-2 d-inline-flex justify-content-end">بداية الحجز</th>
                    <th class="col-1 d-inline-flex justify-content-end">العدد</th>
                    <th class="col-3 d-inline-flex justify-content-end">اسم الزبون</th>
                    </tr>
                    @foreach($resort->getrequests() as $req)
                        <tr>
                            <td class="col-1 d-inline-flex justify-content-end"><a href="/reqden/{{$req->id}}" style = "color:red">رفض</a></td>
                            <td class="col-1 d-inline-flex justify-content-end"><a href="/reqacc/{{$req->id}}" style = "color:green">قبول</a></td>
                            <td class="col-2 d-inline-flex justify-content-end">{{$req->end_date}}</td>
                            <td class="col-2 d-inline-flex justify-content-end">{{$req->start_date}}</td>
                            <td class="col-1 d-inline-flex justify-content-end">{{$req->number_of_people}}</td>
                            <td class="col-3 d-inline-flex justify-content-end"><a href="/proflie/{{$req->customer_id}}">{{$req->getcustomer()->name}}</a></td>
                        </tr>
                    @endforeach
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
