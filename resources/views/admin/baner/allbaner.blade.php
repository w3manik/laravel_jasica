@extends('layouts.dashtar')

@section('content')
@include('layouts.nav')
<div class="page-wrapper">
    <div class="page-content">
    <div>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Baner</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Baner</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <table class="table table-striped">
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Button</th>
                        <th>Image</th>
                        <th>Created</th>
                        <td>Action</td>
                    </tr>
                    @foreach ($baners as $baner)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $baner->title }}</td>
                        <td>{{ $baner->buton_name }}</td>
                        <td><img width="60" src="{{ asset(('uplodes/baner')) }}/{{ $baner->baner_pic }}" alt=""></td>
                        <td>{{ $baner->created_at->diffForHumans() }}</td>
                        <td><a href="{{ url('allbaner/delete') }}/{{ $baner->id }}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('footer_script')
@if (session('bandeel'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('bandeel') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@endsection
