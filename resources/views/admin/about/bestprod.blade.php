@extends('layouts.dashtar')

@section('content')
@include('layouts.nav')
<div class="page-wrapper">
    <div class="page-content">
    <div>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">About</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>about List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>SL</td>
                                <td>Header</td>
                                <td>Desciption</td>
                                <td>Created at</td>
                                <td>Action</td>
                            </tr>
                            @foreach ($aboutitles as $about_title)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $about_title->title }}</td>
                                <td>{{ $about_title->des }}</td>
                                <td>{{ $about_title->created_at->diffForHumans() }}</td>
                                <td><a style="color: red;font-size:20px;" href="{{ url('/abouttprdt') }}/{{ $about_title->id }}"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>about</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/abt/bestprdt') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Head name</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="">Text</label>
                                <textarea name="des" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Head name</label>
                                <input type="text" class="form-control" name="button_name">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Content</button>
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
@if (session('adti'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('adti') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@if (session('ablist'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('ablist') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif


@endsection
