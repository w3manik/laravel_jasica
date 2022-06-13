@extends('layouts.dashtar')

@section('title')
    Profile
@endsection
@section('content')
@include('layouts.nav')
<div class="page-wrapper">
    <div class="page-content">
    <div>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Home</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Name</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('profile/namechange') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Edit Your Name</label>
                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Updated</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Password</h4>
                        </div>
                        <div class="card-header">
                            <form action="{{ url('profile/passchange') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Old Password</label>
                                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="old_password">
                                </div>
                                <div class="mb-3">
                                    <label for="">New Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                                </div>
                                <div class="mb-3">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile Image</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('profile/imagechange') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <p for="">Your Photo</p>
                                    <img width="40" src="{{ asset('uplodes/profile') }}/{{ Auth::user()->profile_photo }}" alt="">
                                </div>
                                <div class="mb-3">
                                    <label for="">Edit Image Name</label>
                                    <input type="file" class="form-control" name="profile_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                    <img class="mt-3" width="50" id="pic" />
                                    @error('profile_photo')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Updated</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
</div>
</div>

@endsection

@section('footer_script')
@if (session('upnae'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('upnae') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('pass_upd'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('pass_upd') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('wrong_pas'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'warning',
    title: '{{ session('wrong_pas') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('proimg'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('proimg') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif



@endsection

