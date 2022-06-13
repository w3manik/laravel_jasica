<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4>Your Ourders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($orders_by_user as $ordcus)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $ordcus->total }}</td>
                            <td>{{ $ordcus->discount }}</td>
                            <td>{{ $ordcus->subtotal }}</td>
                            <td>
                                <a href="{{ url('/invoice/download') }}/{{ $ordcus->id }}" class="btn btn-info">Download</a>
                                <a href="{{ url('/invoice/send') }}/{{ $ordcus->id }}" class="btn btn-primary">Invocie Send</a>
                                <a href="{{ url('/invoice/sms') }}/{{ $ordcus->id }}" class="btn btn-success">Invocie Sms</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('footer_script')
@if (session('eml'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('eml') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@if (session('msuc'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: '{{ session('msuc') }}',
    showConfirmButton: false,
    timer: 2500
    })
</script>
@endif

@endsection
