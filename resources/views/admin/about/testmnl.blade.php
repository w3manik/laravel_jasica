@extends('layouts.dashtar')

@section('content')
@include('layouts.nav')
<div class="page-wrapper">
    <div class="page-content">
    <div>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Team</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Team</li>
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($testimonials as $testimonail)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $testimonail->name }}</td>
                                <td>{{ $testimonail->descp }}</td>
                                <td>
                                    <img width="50" src="{{ asset('uplodes/testimonial') }}/{{ $testimonail->testimonial_image }}" alt="">
                                </td>
                                <td>{{ $testimonail->created_at->diffForHumans() }}</td>
                                <td><a href="{{ url('/adtem/delete') }}/{{ $testimonail->id }}" style="color: red;font-size:18px;"><i class="fa fa-trash"></i></a></td>
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
                        <form action="{{ url('/textimonial') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                           <div class="mb-3">
                               <label for="">Description</label>
                               <textarea name="descp" id="" cols="30" rows="3"></textarea>
                           </div>
                            <div class="mb-3">
                                <label for="">Team Image</label>
                                <input type="file" class="form-control" name="testimonial_image">
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
