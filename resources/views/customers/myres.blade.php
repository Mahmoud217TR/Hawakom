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
                            {{ __('حجوزاتي') }}
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
                            <a href ="/mycurrentres/{{auth()->user()->id}}"> حجوزاتي الحالية </a>
                        </div>
                    </div>
                    <br>

                    <table class= "table">
                    <tr>
                    <th class="col-3 d-inline-flex justify-content-end">تاريخ ووقت القبول</th>
                    <th class="col-2 d-inline-flex justify-content-end">نهاية الحجز</th>
                    <th class="col-2 d-inline-flex justify-content-end">بداية الحجز</th>
                    <th class="col-1 d-inline-flex justify-content-end">الحالة</th>
                    <th class="col-1 d-inline-flex justify-content-end">العدد</th>
                    <th class="col-2 d-inline-flex justify-content-end">اسم المصيف</th>
                    </tr>
                    @foreach(auth()->user()->reservations() as $req)
                        <tr>
                            <td class="col-3 d-inline-flex justify-content-end">{{$req->created_at}}</td>
                            <td class="col-2 d-inline-flex justify-content-end">{{$req->end_date}}</td>
                            <td class="col-2 d-inline-flex justify-content-end">{{$req->start_date}}</td>
                            @if($req->status == 'delivered')
                            <td class="col-1 d-inline-flex justify-content-end" style = "color:green">تسليم</td>
                            @elseif($req->status == 'canceled')
                            <td class="col-1 d-inline-flex justify-content-end" style = "color:red">ملغى</td>
                            @else
                            <td class="col-1 d-inline-flex justify-content-end" style = "color:blue">محجوز </td>
                            @endif
                            <td class="col-1 d-inline-flex justify-content-end">{{$req->number_of_people}}</td>
                            <td class="col-2 d-inline-flex justify-content-end"><a href="/resshow/{{$req->resort_id}}">{{$req->getresort()->site}}</a></td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
