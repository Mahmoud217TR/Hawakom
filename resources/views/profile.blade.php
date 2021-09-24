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
                            {{ __('معلومات المستخدم') }}
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
                        @if($user->user_type == 'customer')
                        <td class="col-6 d-inline-flex justify-content-end">{{$user->name}}</td>
                        <td class="col-3 d-inline-flex justify-content-end">:اسم المستأجر</td>
                        @elseif($user->user_type == 'owner')
                        <td class="col-6 d-inline-flex justify-content-end">{{$user->name}}</td>
                        <td class="col-3 d-inline-flex justify-content-end">:اسم المالك</td>
                        @else
                        <td class="col-6 d-inline-flex justify-content-end">{{$user->name}}</td>
                        <td class="col-3 d-inline-flex justify-content-end">:اسم المدير</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="col-6 d-inline-flex justify-content-end">{{$user->email}}</td>
                        <td class="col-3 d-inline-flex justify-content-end">:البريد الالكتروني</td>
                    </tr>
                    <tr>
                        <td class="col-6 d-inline-flex justify-content-end">{{$user->address}}</td>
                        <td class="col-3 d-inline-flex justify-content-end">:العنوان</td>
                    </tr>
                    <tr>
                        <td class="col-6 d-inline-flex justify-content-end">{{$user->phone}}</td>
                        <td class="col-3 d-inline-flex justify-content-end">:رقم الهاتف</td>
                    </tr>
                    @if($user->user_type == 'owner')
                    
                    <tr>
                        @if($user->resorts()->count() == 0)
                        <td class="col-69 d-inline-flex justify-content-end">لم يتم ادخال مصايف هذا المالك بعد</td>
                        <td class="col-3 d-inline-flex justify-content-end">:المصايف </td>
                        @else
                        <td class="col-6 d-inline-flex justify-content-end">{{$user->resorts()->count()}}</td>
                        <td class="col-3 d-inline-flex justify-content-end">:المصايف </td>
                        @endif
                    </tr>
                    @elseif($user->user_type == 'customer')
                    <tr>
                        <td class="col-6 d-inline-flex justify-content-end">{{$user->reservations()->count()}}</td>
                        <td class="col-3 d-inline-flex justify-content-end">:عدد الحجوزات</td>
                    </tr>
                    @endif
                </table>
                @guest
                @else
                    @if($user->user_type != 'admin' && auth()->user()->user_type == 'admin')
                    <div class="row">
                            <div class="col-md-5 float-right" style ="color:transparent">
                                {{ __(' ') }}
                            </div>
                            <div class="col-md-7 float-right">
                                <a href='/removeuser/{{$user->id}}' class="btn btn-danger">  ازالة هذا المستخدم</a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection
