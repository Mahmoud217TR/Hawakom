@extends('layouts.app')

@section('content')
<div class="container" style ="min-height:70vh;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br><br><br>
            <div class="card">
            <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-9 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-3 pr-0 pl-5 float-right">
                            {{ __('تصنيفات المصايف') }}
                        </div>
                    </div>
                </div>

                <div class="card-body" style= "height:200px">
                    <br><br>
                    <!-- start -->
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        @foreach(\App\Models\Category::all() as $c)
                            @if($loop->index == 0)
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style = "background-color:black"></li>
                            @elseif($loop->index%3 == 0)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index/3}}" style = "background-color:black"></li>
                            @endif
                        @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach(\App\Models\Category::all() as $c)
                                @if($loop->index == 0)
                            <div class="carousel-item active mb-5">
                                <center>
                                    <div class = "row justify content center">
                                @elseif($loop->index%3 == 0)
                                <div class="carousel-item  mb-5">
                                    <center>
                                    <div class = "row justify content center">
                                @endif
                                        <div class = 'col'>
                                            <a href="cate_show/{{$c->id}}" style = "color: black;font-size:25px;">{{$c->name}} </a>
                                        </div>
                                @if($loop->index%3 == 2 || $loop->index == \App\Models\Category::all()->count()-1)        
                                    </div>
                                </center>
                            </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev mb-5" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                            <span class="sr-only ">Previous</span>
                        </a>
                        <a class="carousel-control-next mb-5" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon ml-5" aria-hidden="true"></span>
                            <span class="sr-only ">Next</span>
                        </a>
                    </div>
                <!-- end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
