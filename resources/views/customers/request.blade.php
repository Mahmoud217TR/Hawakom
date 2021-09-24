@extends('layouts.app')

@section('content')
<div class="container" style ="min-height:70vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-7 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-5 pr-0 pl-5 float-right">
                            {{__(' طلب مصيف')}} {{ $res->site }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/reqresort/{{$res->id}}" >
                        @csrf

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="max" class="col-md-3 col-form-label text-md-right">{{ __('عدد الاشخاص') }}</label>

                            <div class="col-md-7">
                                <input id="number_of_people" type="number" class="form-control @error('number_of_people') is-invalid @enderror" dir="rtl" name="number_of_people" required >

                                @error('number_of_people')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @foreach($res->getavailaleperiods() as $p)
                        <div class="form-group d-flex flex-row-reverse">
                            <label  class="col-md-3 col-form-label text-md-right">{{ __('تاريخ الحجز') }}</label>

                            <div class="col-md-9 text-md-right">
                                <input class="form-check-input mt-4" type="radio" name="period" id="period" required value="{{$p->id}}">
                                <label  class="col-md-4 col-form-label text-md-right" dir="rtl">{{ __(' وحتى تاريخ ') }}{{ $p->end_date }}</label>
                                <label  class="col-md-4 col-form-label text-md-right" dir="rtl">{{ __(' من تاريخ ') }}{{ $p->start_date }}</label>
                                
                            </div>
                            
                        </div>
                        @endforeach
                        <br>
                        <br>
                        <div class="form-group d-flex flex-row-reverse mt-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('طلب') }}
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
