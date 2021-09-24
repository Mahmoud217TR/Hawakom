@extends('layouts.app')

@section('content')
<div class="container" style ="min-height:70vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-8 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-4 pr-0 pl-5 float-right">
                            {{ __('تعديل أوقات الحجوزات') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($res->getavailaleperiods()->count() > 0)
                    <form method="POST" action="/editperiods" >
                        @csrf

                        <input type="hidden" id="resort_id" name="resort_id" value="{{$res->id}}">

                        @foreach($res->getavailaleperiods() as $p)
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="s_date{{$p->id}}" class="col-md-2 col-form-label text-md-right">{{$loop->index+1}}{{ __(' تاريخ بداية ') }}</label>

                            <div class="col-md-4">
                                <input id="s_date{{$p->id}}" type="date" class="form-control" name="s_date{{$p->id}}" required value="{{$p->start_date}}">
                            </div>
                            <label for="e_date{{$p->id}}" class="col-md-2 col-form-label text-md-right">{{$loop->index+1}}{{ __(' تاريخ نهاية') }}</label>

                            <div class="col-md-3">
                                <input id="e_date{{$p->id}}" type="date" class="form-control" name="e_date{{$p->id}}" required value="{{$p->end_date}}">
                            </div>
                            <div class="col-md-1">
                                <a href ="/delperiod/{{$p->id}}" style="color:red">حذف</a>
                            </div>
                        </div>
                        @endforeach

                        <div class="form-group d-flex flex-row-reverse mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تعديل') }}
                                </button>

                            </div>
                        </div>
                    </form>
                    @else
                    <div class="row">
                        <div class="col-md-4 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-5 pr-0 pl-5 float-right">
                            <h5 style = "Color:red">جميع الفترات محجوزة</h5>
                        </div>
                    </div>
                    
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-9 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-3 pr-2 pl-4 float-right">
                            {{ __('إضافة فترة حجز جديدة') }}
                        </div>
                    </div>
                    <br>
                    
                    <form method="POST" action="/addeditperiods" >
                        @csrf
                        <input type="hidden" id="resort_id" name="resort_id" value="{{$res->id}}">
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="s_date" class="col-md-2 col-form-label text-md-right">{{ __(' تاريخ بداية جديد ') }}</label>

                            <div class="col-md-4">
                                <input id="s_date" type="date" class="form-control" name="s_date" required >
                            </div>
                            <label for="e_date" class="col-md-2 col-form-label text-md-right">{{ __(' تاريخ نهاية جديد') }}</label>

                            <div class="col-md-4">
                                <input id="e_date" type="date" class="form-control" name="e_date" required >
                            </div>
                        </div>
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
