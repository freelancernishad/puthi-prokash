
@php
$row = json_decode($rows);
@endphp
<html>
<head>
    <title>{{ $row->subject }}</title>
</head>
<body>



    <h1>Puthiprokash received a new order!</h1>

    <p style="margin:0 !important;">Order Number:{{ $row->message->orderId }}}</p>
    <p style="margin:0 !important;">Customer Name: {{ $row->name }}</p>
    <p style="margin:0 !important;">Address: {{ $row->message->user_thana }}, {{ $row->message->user_district }} , {{ $row->message->country }}</p>
    <p style="margin:0 !important;">Payment Method:{{ $row->message->paymentMethod }}}</p>



    <table width='100%' border="1" style="border-collapse:collapse">
        <thead>
          <tr>
            <th class="desc">Item Description</th>
            <th class="id">Item ID</th>
            <th class="qty">Quantity</th>
            <th class="qty">Price</th>
            <th class="amt">Subtotal</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($row->message->order_products as $item)


          <tr class="item">
            <td class="desc">{{ $item->product->name }}</td>
            <td class="id num">{{ $item->product->ISBN }}</td>
            <td class="qty">{{ $item->quantity }}</td>
            <td class="qty">{{ $item->product->price }} BDT</td>
            <td class="amt">{{ $item->quantity*$item->product->price }} BDT</td>
          </tr>

          @endforeach

        </tbody>
      </table>


       <p style="margin:0 !important;">Total Quantity: {{ $row->message->total_quantity }}</p>
       <p style="margin:0 !important;">Total ordered Amount: Tk. {{ $row->message->total_amount }} BDT</p>



</body>
</html>
