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
                            {{ __('فترات الحجوزات') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/addperiods" >
                        @csrf

                        <input type="hidden" id="resrequest_id" name="resrequest_id" value="{{$res_id}}">
                        <input type="hidden" id="num" name="num" value="{{$num}}">

                        @for($i = 1 ; $i <= $num ; $i++)
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="s_date{{$i}}" class="col-md-3 col-form-label text-md-right">{{$i}}{{ __('تاريخ بداية الحجز') }}</label>

                            <div class="col-md-3">
                                <input id="s_date{{$i}}" type="date" class="form-control" name="s_date{{$i}}" required >
                            </div>
                            <label for="e_date{{$i}}" class="col-md-3 col-form-label text-md-right">{{$i}}{{ __('تاريخ نهاية الحجز') }}</label>

                            <div class="col-md-3">
                                <input id="e_date{{$i}}" type="date" class="form-control" name="e_date{{$i}}" required >
                            </div>
                        </div>
                        @endfor

                        <div class="form-group d-flex flex-row-reverse mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('اضافة') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
