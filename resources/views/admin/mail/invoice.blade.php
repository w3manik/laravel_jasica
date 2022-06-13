<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table width="500" cellpadding="20" cellspacinng="10" border="1" align="center">
    <tr>
        <th>Total</th>
        <th>Discount</th>
        <th>Subtotal</th>
    </tr>
    @foreach ($data as $info)
    <tr align="center">
        <td>{{ $info->total }}</td>
        <td>{{ $info->discount }}</td>
        <td>{{ $info->subtotal }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>
