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
                            {{ __('تقييم الحجز') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/rate">
                        @csrf
                        <input type="hidden" id="res_id" name="res_id" value="{{$res->id}}">
                        
                        <div class="form-group d-flex flex-row-reverse ml-5">
                            <label class="col-md-2 col-form-label text-md-right">{{ __('التقييم') }}</label>
                            
                            <div class="form-check mt-2 col-md-2">
                                <input class="form-check-input" type="radio" name="rating" id="r1" value="1">
                                    <label class="form-check-label pl-2" for="exampleRadios1">1</label>
                            </div>
                            <div class="form-check mt-2 col-md-2">
                                <input class="form-check-input" type="radio" name="rating" id="r2" value="2">
                                    <label class="form-check-label" for="exampleRadios1">2</label>
                            </div>
                            <div class="form-check mt-2 col-md-2">
                                <input class="form-check-input" type="radio" name="rating" id="r3" value="3" checked>
                                    <label class="form-check-label pl-2" for="exampleRadios1">3</label>
                            </div>
                            <div class="form-check mt-2 col-md-2">
                                <input class="form-check-input" type="radio" name="rating" id="r4" value="4">
                                    <label class="form-check-label" for="exampleRadios1">4</label>
                            </div>
                            <div class="form-check mt-2 col-md-2">
                                <input class="form-check-input" type="radio" name="rating" id="r5" value="5">
                                    <label class="form-check-label" for="exampleRadios1">5</label>
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تقييم') }}
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
