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
                        {{$rep->id }}{{ __(' بلاغ رقم') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                <form method="POST" action="#" >
                        @csrf
                        
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="name" class="col-md-3 col-form-label text-md-right" >{{ __('الاسم الكامل') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" dir="rtl" name="name" value="{{ $rep->name}}" disabled autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="name" class="col-md-3 col-form-label text-md-right" >{{ __('جهة الابلاغ') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" dir="rtl" name="name" @if(is_null($rep->uid)) value = "ضيف" @elseif($rep->getuser()->user_type == 'owner') value="مالك"@else value="زبون"@endif disabled autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('عنوان المشكلة') }}</label>

                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" dir="rtl" name="title" value ="{{$rep->title}}" disabled >

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="desc" class="col-md-3 col-form-label text-md-right">{{ __('نص المشكلة') }}</label>
                
                            <div class="col-md-7">
                                <textarea id="desc" class="form-control" name="desc" style ="resize: none;height:200px" dir="rtl" disabled>{{$rep->desc}}</textarea> 
                            </div>
                        </div>
                        

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="phone" class="col-md-3 col-form-label text-md-right">{{ __('رقم الهاتف') }}</label>

                            <div class="col-md-7">
                                <input id="phone" type="number" class="form-control" name="phone" value= "{{$rep->phone}}" min = 0 disabled>
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('البريد الالكتروني') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $rep->email }}" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
