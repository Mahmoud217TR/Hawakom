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
                            {{ __('المصايف الأكثر زيارة') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class= "table">
                    <tr>
                    <th class="col-4 d-inline-flex justify-content-end">اسم المالك</th>
                    <th class="col-4 d-inline-flex justify-content-end">اسم المصيف</th>
                    <th class="col-2 d-inline-flex justify-content-end">الترتيب </th>
                    </tr>
                    @foreach(\App\Models\Reservation::getmostwanted()->where('visible','=',true) as $res)
                        <tr>
                            <td class="col-4 d-inline-flex justify-content-end"><a href="/profile/{{$res->user_id}}">{{$res->getowner()->name}}</a></td>
                            <td class="col-4 d-inline-flex justify-content-end"><a href="/resshow/{{$res->id}}">{{$res->site}}</a></td>
                            <th class="col-2 d-inline-flex justify-content-end">{{$loop->index+1}}</th>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
