<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Invoice Download!</title>
  </head>
  <body>

    <table width="500" cellpading="0" cellspacing="0" align="center" border="1">
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            {{-- <th>Product Discount</th> --}}
        </tr>
        @foreach (App\Models\orpder_product_details::where('order_id', $data->id)->get() as $order_details )
        <tr align="center">
            <td>{{ $order_details->product_name }}</td>
            <td>{{ $order_details->product_price }}</td>
            {{-- <td>{{ App\Models\Order::find($order_details->discount) }}</td> --}}
        </tr>
        @endforeach
    </table>

  </body>
</html>
