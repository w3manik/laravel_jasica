@extends('layouts.dashtar')

@section('content')
@include('layouts.nav')
<div class="page-wrapper">
    <div class="page-content">
    <div>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Faq</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Faq</li>
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
                        <h4>Faq List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>SL</td>
                                <td>Title</td>
                                <td>Message</td>
                                <td>Created at</td>
                                <td>Action</td>
                            </tr>
                            @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $faq->faq_title }}</td>
                                <td>{{ $faq->faq_message }}</td>
                                <td>{{ $faq->created_at->diffForHumans() }}</td>
                                <td><a style="color: red;font-size:20px;" href="{{ url('/faq/delete') }}/{{ $faq->id }}"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Faq</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/faq/insert') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">faq title</label>
                                <input type="text" class="form-control" name="faq_title">
                            </div>
                            <div class="mb-3">
                                <label for="">faq message</label>
                                <textarea name="faq_message" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add About</button>
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
@if (session('faqad'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('faqad') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('faqdele'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('faqdele') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@endsection
