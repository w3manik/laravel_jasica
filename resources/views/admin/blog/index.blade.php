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
                        <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Blog List:</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Validity</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->blog_validity }}</td>
                                <td>{{ $blog->blog_desc }}</td>
                                <td>
                                    <img width="50" src="{{ asset('uplodes/blog') }}/{{ $blog->blog_img }}" alt="">
                                </td>
                                <td>{{ $blog->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ url('/blog/delete') }}/{{ $blog->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Blog</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/blog/insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title">
                                @error('title')
                                    <div class="alert alert-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Validatity</label>
                                <input type="date" class="form-control" name="blog_validity">
                                @error('blog_validity')
                                <div class="alert alert-warning">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="blog_desc" type="text" class="form-control" id="" cols="20" rows="5"></textarea>
                                @error('blog_desc')
                                <div class="alert alert-warning">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="blog_img">
                                @error('blog_img')
                                <div class="alert alert-warning">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Blog</button>
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
@if (session('blog'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('blog') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>delb
@endif

@if (session('delb'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('delb') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@endsection
