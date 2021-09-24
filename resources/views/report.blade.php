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
                            {{ __('ابلاغ عن مشكلة') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                <form method="POST" action="/reportsubmit" >
                        @csrf
                        
                        @guest
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="name" class="col-md-3 col-form-label text-md-right" >{{ __('الاسم الكامل') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" dir="rtl" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @else
                            <input type="hidden" id="name" name="name" value="{{auth()->user()->name}}">
                        @endguest
                        

                        @guest
                            <input type="hidden" id="guest" name="guest" value="guest">
                        @else
                            <input type="hidden" id="uid" name="uid" value="{{auth()->user()->id}}">
                        @endguest
                        

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('عنوان المشكلة') }}</label>

                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" dir="rtl" name="title" required >

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
                                <textarea id="desc" class="form-control" name="desc" style ="resize: none;height:200px" dir="rtl"></textarea> 
                            </div>
                        </div>
        
                        @guest
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="phone" class="col-md-3 col-form-label text-md-right">{{ __('رقم الهاتف') }}</label>

                            <div class="col-md-7">
                                <input id="phone" type="number" class="form-control" name="phone" required min = 0 required>
                            </div>
                        </div>
                        @else
                            <input type="hidden" id="phone" name="phone" value="{{auth()->user()->phone}}">
                        @endguest

                        @guest
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('البريد الالكتروني') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @else
                            <input type="hidden" id="email" name="email" value="{{auth()->user()->email}}">
                        @endguest

                        
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="email" style ="color:transparent" class="col-md-3 col-form-label text-md-right">{{ __(' ') }}</label>

                            <div class="col-md-7">
                                <p style ="font-size:15px">سيتم التواصل معكم عبر البريد الالكتروني او رقم الهاتف عند مراجعة المشكلة</p>
                            </div>
                        </div>
                        
                        <div class="form-group d-flex flex-row-reverse mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('ابلاغ') }}
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
