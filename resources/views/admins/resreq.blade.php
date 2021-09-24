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
                            {{ __('طلبات المصايف') }}
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
                        @foreach(\App\Models\Resrequest::all() as $rr)
                        <tr>
                            <td class="col-2 d-inline-flex justify-content-end"><a href="/resreqden/{{$rr->id}}" style="color:red">رفض</a></td>
                            <td class="col-2 d-inline-flex justify-content-end"><a href="/resreqacc/{{$rr->id}}" style="color:green">قبول</a></td>
                            <td class="col-8 d-inline-flex justify-content-end"><a href="/resreqfullshow/{{$rr->id}}">{{$rr->site}}</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
