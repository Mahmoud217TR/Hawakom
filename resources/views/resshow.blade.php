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

                        @foreach($res->getavailaleperiods() as $p)
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
                            <label for="e_date" class="col-md-3 col-form-label text-md-right">{{ __('التقييم') }}</label>

                            <div class="col-md-7">
                            @if($res->getrating() > 0)
                            @for($i = 1 ; $i <= $res->getrating();$i++)
                                <a style="color:blue;font-size:20px;padding-right:10px" dir="rtl" ><svg xmlns="http://www.w3.org/2000/svg" style = "fill:gold" width="24" height="24" viewBox="0 0 24 24"><path  d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg></a>
                                @if($i < $res->getrating() && $i+1 > $res->getrating())
                                <a style="color:blue;font-size:20px;padding-right:10px" dir="rtl" ><svg xmlns="http://www.w3.org/2000/svg" style = "fill:gold" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524v-12.005zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg></a>
                                @endif
                            @endfor
                            @else
                            <a style="color:blue;font-size:20px;padding-right:10px" dir="rtl" > لم يتم التقييم بعد</a>
                            @endif
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="e_date" class="col-md-3 col-form-label text-md-right">{{ __('التصنيف') }}</label>

                            <div class="col-md-7">
                            @foreach($res->categories as $rc)
                                <a style="color:blue;font-size:20px;padding-right:20px" dir="rtl" href="/cate_show/{{$rc->id}}"> {{$rc->name}} </a>
                            @endforeach
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="e_date" class="col-md-3 col-form-label text-md-right">{{ __('الحالة') }}</label>

                            <div class="col-md-7">
                                @if($res->availability())
                                <p style="color:green;font-size:20px" dir="rtl">متاح</p>
                                @else
                                <p style="color:red;font-size:20px" dir="rtl">محجوز</p>
                                @endif
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
                        <div class="form-group d-flex flex-row-reverse">
                            <div class="col-md-7">
                            @guest
                            <a style="font-size:20px" class="btn btn-primary" dir="rtl"  style ="color:green" href="/reqresortshow/{{$res->id}}">  طلب حجز  </a>
                            @else
                                @if(auth()->user()->user_type == 'customer')
                                    @if(!$res->availability())
                                    <a style="font-size:20px;color:red;margin-left:-10%" dir="rtl" class = "mr-5">  عذرا هذا المصيف محجوز</a>
                                    @else
                                    <a class="btn btn-primary" style="font-size:20px;" dir="rtl"  href="/reqresortshow/{{$res->id}}">  طلب حجز  </a>
                                    @endif
                                @elseif(auth()->user()->user_type == 'admin')
                                    @if($res->visible)
                                        <a class="btn btn-danger" style="font-size:20px" dir="rtl" href= "/archiveres/{{$res->id}}"> أرشفة المصيف</a>
                                    @else
                                        <a class="btn btn-primary" style="font-size:20px" dir="rtl" href="/unarchiveres/{{$res->id}}"> إلغاء أرشفة المصيف </a>
                                    @endif
                                @endif
                            @endguest
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
