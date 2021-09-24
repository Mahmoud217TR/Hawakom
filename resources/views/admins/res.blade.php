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
                            {{ __('الحجوزات') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class= "table">
                    <tr>
                    <th class="col-2 d-inline-flex justify-content-end">نهاية الحجز</th>
                    <th class="col-2 d-inline-flex justify-content-end">بداية الحجز</th>
                    <th class="col-1 d-inline-flex justify-content-end">الحالة</th>
                    <th class="col-1 d-inline-flex justify-content-end">العدد</th>
                    <th class="col-3 d-inline-flex justify-content-end">اسم المستأجر</th>
                    <th class="col-3 d-inline-flex justify-content-end">اسم المصيف</th>
                    </tr>
                    @foreach(\App\Models\Reservation::all()->reverse() as $req)
                        <tr>
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
                            @if(is_null($req->getcustomer()))
                            <td class="col-3 d-inline-flex justify-content-end"><a style ="color:red">{{$req->name}}</a></td>
                            @else
                            <td class="col-3 d-inline-flex justify-content-end"><a href="/profile/{{$req->getcustomer()->id}}">{{$req->getcustomer()->name}}</a></td>
                            @endif
                            @if(is_null($req->getresort()))
                            <td class="col-3 d-inline-flex justify-content-end"><a style = "color:red">$req->site</a></td>
                            @else
                            <td class="col-3 d-inline-flex justify-content-end"><a href="/resshow/{{$req->resort_id}}">{{$req->getresort()->site}}</a></td>
                            @endif
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
