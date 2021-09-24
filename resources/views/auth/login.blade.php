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
                            {{ __('تسجيل الدخول') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <marquee behavior="alternate"loop="100" bgcolor="efefef"  direction="right" width=100% hight=80% style="background-color:transparent"><b><i><h3><font color="0b0b3b"> أهلاً و سهلاً بكم  </marquee>
                    <br>
                    <br>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('البريد الالكتروني') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('البقاء قيد تسجيل الدخول') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تسجيل الدخول') }}
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
