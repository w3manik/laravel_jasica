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
                        <li class="breadcrumb-item active" aria-current="page">About Slider</li>
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
                        <h4>Team List:</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripd">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($aboutlogos as $ablogo)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $ablogo->created_at->diffForHumans() }}</td>
                                <td>
                                    <img width="50" src="{{ asset('uplodes/ablogo') }}/{{ $ablogo->about_pic }}" alt="">
                                </td>
                                <td><a href="{{ url('/adtem/delete') }}/{{ $ablogo->id }}" style="color: red;font-size:18px;"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Testimonial</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/abslider') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">About Slider Image</label>
                                <input type="file" class="form-control" name="about_pic">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Team</button>
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
@if (session('testad'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('testad') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('tem'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('tem') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@endsection
