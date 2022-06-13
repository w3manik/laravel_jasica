@extends('layouts.dashtar')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Plz Check Your Email / Enter Your Email</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('verification.send') }}" method="post">
                        @csrf
                        <div class="mb-5">
                            <input type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Resend Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
