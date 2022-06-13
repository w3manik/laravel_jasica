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
                        <li class="breadcrumb-item active" aria-current="page">Add Baner</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Baner</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('baner/insert') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Buton Name</label>
                            <input type="text" class="form-control" name="buton_name">
                        </div>
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="">Baner Image</label>
                            <input type="file" class="form-control" name="baner_pic">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Baner</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection


@section('footer_script')
@if (session('banad'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('banad') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@endsection
