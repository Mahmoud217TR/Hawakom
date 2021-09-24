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
                            {{ $res->site }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="#">
                        @csrf

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="site" class="col-md-3 col-form-label text-md-right">{{ __('موقع المصيف') }}</label>

                            <div class="col-md-7">
                                <input id="site" type="text" class="form-control @error('site') is-invalid @enderror" dir="rtl" name="site" disabled value= '{{$res->site}}'>
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="number_of_rooms" class="col-md-3 col-form-label text-md-right">{{ __('عدد الغرف') }}</label>

                            <div class="col-md-7">
                                <input id="number_of_rooms" type="number" class="form-control @error('number_of_rooms') is-invalid @enderror"value= '{{$res->number_of_rooms}}' dir="rtl" name="number_of_rooms" disabled>
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="fare" class="col-md-3 col-form-label text-md-right">{{ __('الاجرة') }}</label>

                            <div class="col-md-7">
                                <input id="fare" type="number" class="form-control @error('fare') is-invalid @enderror" dir="rtl" name="fare" disabled value= '{{$res->fare}}' >
                            </div>
                        </div>

                        
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="extra" class="col-md-3 col-form-label text-md-right">{{ __('ميزات اضافية') }}</label>
                
                            <div class="col-md-7">
                                <textarea id="extra" class="form-control" name="extra" style ="resize: none;height:100px" dir="rtl" disabled >{{$res->extra}}</textarea> 
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-9 float-right" style ="color:transparent">
                                {{ __(' ') }}
                            </div>
                            <div class="col-md-3 pr-0 pl-5 float-right"><h4>تواريخ الحجز</h4></div>
                        </div>
                        <br>

                        @foreach($res->getperiods() as $p)
                        <div class="form-group d-flex flex-row-reverse">
                            <label  class="col-md-2 col-form-label text-md-right">{{$loop->index+1}}{{ __(' بداية ') }}</label>

                            <div class="col-md-4">
                                <input disabled type="date" class="form-control" value ="{{$p->start_date}}">
                            </div>
                            <label class="col-md-2 col-form-label text-md-right">{{$loop->index+1}}{{ __(' نهاية ') }}</label>

                            <div class="col-md-4">
                                <input disabled type="date" class="form-control"  value ="{{$p->end_date}}">
                            </div>
                        </div>
                        @endforeach


                        <div class="form-group d-flex flex-row-reverse">
                            <label for="e_date" class="col-md-3 col-form-label text-md-right">{{ __('التصنيف') }}</label>

                            <div class="col-md-7">
                            @foreach($res->categories as $rc)
                                <a style="color:blue;font-size:20px;padding-right:20px" dir="rtl" href="/cate_show/{{$rc->id}}"> {{$rc->name}} </a>
                            @endforeach
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="site" class="col-md-3 col-form-label text-md-right">{{ __('مالك المصيف') }}</label>

                            <div class="col-md-7">
                                <a dir="rtl" name="site" href="/profile/{{$res->getowner()->id}}" style ="color:green">{{$res->getowner()->name}}</a>
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="site" class="col-md-3 col-form-label text-md-right">{{ __('رقم هاتف المالك') }}</label>

                            <div class="col-md-7">
                                <input id="site" type="text" class="form-control @error('site') is-invalid @enderror" dir="rtl" name="site" disabled value= '{{$res->getowner()->phone}}'>
                            </div>
                        </div>

                        @if($res->getpics()->count() > 0)
                        <br>
                            <div class="row">
                                <div class="col">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                        @foreach($res->getpics() as $pic)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" @if($loop->index == 0) class="active" @endif ></li>
                                        @endforeach
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach($res->getpics() as $pic)
                                            <div class="carousel-item @if($loop->index == 0) active @endif">
                                                <img class="d-block w-100 img-fluid" src="/storage/{{$pic -> url}}" alt="Resort Pics" style ="border-radius:20px">
                                            </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="filter: invert(100%);">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="filter: invert(100%);">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <br>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
