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
                            {{ __('اضافة تصنيف') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/addcat">
                        @csrf

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('اسم التصنيف') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" dir="rtl" name="name" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="desc" class="col-md-3 col-form-label text-md-right">{{ __('وصف التصنيف') }}</label>
                
                            <div class="col-md-7">
                                <textarea id="desc" class="form-control" name="desc" style ="resize: none;height:100px" dir="rtl" required></textarea> 
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
