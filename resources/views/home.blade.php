@extends('layouts.dashtar')
@section('title')
    Home
@endsection
@section('content')
@include('layouts.nav')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
        @if(Auth::user()->role == 2)
            @include('admin.parts.admindash')
        @elseif(Auth::user()->role == 3)
            @include('admin.parts.shopkeeper')
        @elseif(Auth::user()->role == 1)
            @include('admin.parts.customer')
         @endif
        </div>
    </div>
    <!--end page wrapper -->

@endsection
