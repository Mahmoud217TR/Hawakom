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
                    
                    <table class= "table">
                    <tr>
                    <th class="col-3 d-inline-flex justify-content-end">تسليم المصيف</th>
                    <th class="col-3 d-inline-flex justify-content-end">إلغاء الحجز</th>
                    <th class="col-4 d-inline-flex justify-content-end">اسم المصيف</th>
                    </tr>
                    @foreach(auth()->user()->getmycurrentres() as $res)
                        <tr>
                                <input type="hidden" id="resort_id" name="resort_id" value="{{$res->id}}">
                                <td class="col-3 d-inline-flex justify-content-end"><a href="/gback/{{$res->id}}" class="btn btn-success">تسليم</a></td>
                                <td class="col-3 d-inline-flex justify-content-end"><a href="/cancel/{{$res->id}}" class="btn btn-danger">إلغاء</a></td>
                                <td class="col-4 d-inline-flex justify-content-end"><a href="/resshow/{{$res-> getresort()->id}}">{{$res-> getresort()->site}}</a></td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
