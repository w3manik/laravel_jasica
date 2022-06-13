@extends('layouts.dashtar')
@section('title')
    Add Cupon
@endsection

@section('content')
@include('layouts.nav')

<div class="page-wrapper">
        <div class="page-content">
            <div>
                <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Home</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Cupon</li>
							</ol>
						</nav>
					</div>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Cupon List:</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>SL</th>
                                            <th>Cupon Name</th>
                                            <th>Discount</th>
                                            <th>Validity</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($cupons as $cupon)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $cupon->cupon_name }}</td>
                                            <td>{{ $cupon->copon_discount }}</td>
                                            <td>{{ $cupon->copon_valadity }}</td>
                                            <td>{{ $cupon->created_at->diffForHumans() }}</td>
                                            <td><a href="#" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Cupon</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('/cupon/insert') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Cupon Name</label>
                                            <input type="text" class="form-control" name="cupon_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Coupon Discount</label>
                                            <input type="text" class="form-control" name="copon_discount">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Coupon Validaty</label>
                                            <input type="date" class="form-control" name="copon_valadity">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Add Cupon</button>
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
@if (session('cupon'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('cupon') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif
@endsection
