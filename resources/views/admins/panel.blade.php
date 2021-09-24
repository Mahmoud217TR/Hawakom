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
                            {{ __('لوحة التحكم') }}
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
                            <td class="col-9 d-inline-flex justify-content-end"><a href="addcateshow">اضافة تصنيف</a></td>
                        </tr>
                        <tr>
                            <td class="col-9 d-inline-flex justify-content-end"><a href="resreqshow">طلبات المصايف</a></td>
                        </tr>
                        <tr>
                            <td class="col-9 d-inline-flex justify-content-end"><a href="/reportshowing">عرض الابلاغات</a></td>
                        </tr>
                        <tr>
                            <td class="col-9 d-inline-flex justify-content-end"><a href="/showallres">عرض الحجوزات</a></td>
                        </tr>
                        <tr>
                            <td class="col-9 d-inline-flex justify-content-end"><a href="mostvisited">عرض المصايف الأكثر زيارة</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
