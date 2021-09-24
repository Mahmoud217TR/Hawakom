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
                            {{ __('الابلاغات') }}
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
                    <th class="col-1 d-inline-flex justify-content-end">حذف</th>
                    <th class="col-2 d-inline-flex justify-content-end">الحالة</th>
                    <th class="col-4 d-inline-flex justify-content-end">التاريخ</th>
                    <th class="col-4 d-inline-flex justify-content-end">العنوان</th>
                    </tr>
                    @foreach(\App\Models\Vioreport::all() as $rep)
                        <tr>
                            <td class="col-1 d-inline-flex justify-content-end"><a href = "/delreport/{{$rep->id}}" style ="color:red">حذف</a></td>
                            <td class="col-2 d-inline-flex justify-content-end">@if($rep->veiwed == true)مقروءة@else غير مقروءة@endif</td>
                            <td class="col-4 d-inline-flex justify-content-end">{{$rep->created_at}}</td>
                            <td class="col-4 d-inline-flex justify-content-end"><a href="/reportshow/{{$rep->id}}">{{$rep->title}}</a></td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
