@extends('layouts.app')

@section('content')
<div class="container " style ="min-height:70vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-9 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-3 pr-0 pl-5 float-right">
                            {{ $category->name }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="col-9 container-fluid"><bdi class =" float-right" style = "font-size:20px" dir="rtl">{{ $category->desc }}</bdi></p>
                    <br>
                    <hr>
                    <br>
                    <table class= "table">
                        @foreach($category->resorts->where('visible','=',true) as $rs)
                        <tr>
                            <td class="col-9 d-inline-flex justify-content-end"><a href="/resshow/{{$rs->id}}" style="font-size:15px;color green">{{$rs->site}}</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
