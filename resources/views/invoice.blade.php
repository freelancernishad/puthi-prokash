
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation-flex.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <style>
        body {
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
  color: #322d28;
}

header.top-bar h1 {
  font-family: "Montserrat", sans-serif;
}

main {
  margin-top: 4rem;
  min-height: calc(100vh - 107px);
}
main .inner-container {
  max-width: 100%;
  margin: 0 auto;
}

table {
  width: 100%;
}
table.invoice {
  background: #fff;
}
table.invoice .num {
  font-weight: 200;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  font-size: 0.8em;
}
table.invoice tr, table.invoice td {
  background: #fff;
  text-align: left;
  font-weight: 400;
  color: #322d28;
}
table.invoice tr.header td img {
  max-width: 200px;
}
table.invoice tr.header td h2 {
  text-align: right;
  font-family: "Montserrat", sans-serif;
  font-weight: 200;
  font-size: 2rem;
  color: #1779ba;
}
table.invoice tr.intro td:nth-child(2) {
  text-align: right;
}
table.invoice tr.details > td {
  padding-top: 0px;
  padding-bottom: 0;
}
table.invoice tr.details td.id, table.invoice tr.details td.qty, table.invoice tr.details th.id, table.invoice tr.details th.qty {
  text-align: center;
}
table.invoice tr.details td:last-child, table.invoice tr.details th:last-child {
  text-align: right;
}
table.invoice tr.details table thead, table.invoice tr.details table tbody {
  position: relative;
}
table.invoice tr.details table thead:after, table.invoice tr.details table tbody:after {
  content: "";
  height: 1px;
  position: absolute;
  width: 100%;
  left: 0;
  margin-top: -1px;
  background: #c8c3be;
}
table.invoice tr.totals td {
  padding-top: 0;
}
table.invoice tr.totals table tr td {
  padding-top: 0;
  padding-bottom: 0;
}
table.invoice tr.totals table tr td:nth-child(1) {
  font-weight: 500;
}
table.invoice tr.totals table tr td:nth-child(2) {
  text-align: right;
  font-weight: 200;
}
table.invoice tr.totals table tr:nth-last-child(2) td {
  padding-bottom: 0.5em;
}
table.invoice tr.totals table tr:nth-last-child(2) td:last-child {
  position: relative;
}
table.invoice tr.totals table tr:nth-last-child(2) td:last-child:after {
  content: "";
  height: 4px;
  width: 100%;
  border-top: 1px solid #1779ba;
  border-bottom: 1px solid #1779ba;
  position: relative;
  right: 0;
  bottom: -0.575rem;
  display: block;
}
table.invoice tr.totals table tr.total td {
  font-size: 1.2em;
  padding-top: 0.5em;
  font-weight: 700;
}
table.invoice tr.totals table tr.total td:last-child {
  font-weight: 700;
}

.additional-info h5 {
  font-size: 0.8em;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: #1779ba;
}
    </style>

</head>
<body>





  <div class="row expanded">
    <main class="columns" style="margin-top: 15px;">
      <div class="inner-container">
        <header class="row align-center"><a class="button" id="printButton"><i class="ion ion-ios-printer-outline"></i> Print Invoice</a>
        </header>

          <div class="callout large invoice-container">
            <table class="invoice" style="margin-bottom: -5px;">
              <tr class="header">
                <td class="" width="30%">
                  <img src="{{ asset(settings()->header_logo) }}" alt="Company Name" />
                </td>
                <td class="align-right"  width="70%">
                  <h2>Invoice</h2>
                </td>
              </tr>
            </table>

              <table class="invoice">

              <tr class="intro">
                <td class="">
                  Hello, Philip Brooks.<br>
                  Thank you for your order.

                  <section class="additional-info">
                    <div class="row">
                      <div class="columns">
                        <h5>Billing Information</h5>
                        <p>Philip Brooks<br>
                          134 Madison Ave.<br>
                          New York NY 00102<br>
                          United States</p>
                      </div>
                    </div>
                  </section>


                </td>
                <td class="text-right">
                  <span class="num">Order #00302</span><br>
                  October 18, 2017
                </td>
              </tr>
              <tr class="details">
                <td colspan="2">
                  <table>
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

                        @foreach ($order->orderProducts as $item)


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
                </td>
              </tr>
              <tr class="totals">
                <td></td>
                <td>
                  <table>
                    <tr class="subtotal">
                      <td class="num">Subtotal</td>
                      <td class="num">{{ $order->amount }} BDT</td>
                    </tr>
                    <tr class="fees">
                      <td class="num">Shipping & Handling</td>
                      <td class="num">{{ $order->delevery }} BDT</td>
                    </tr>

                    <tr class="total">
                      <td>Total</td>
                      <td>{{ $order->total_amount }} BDT</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>


          </div>

      </div>
    </main>
  </div>





<script>
    // Function to handle the afterprint event
    function handleAfterPrint() {
        // Show the "Print Invoice" button again
        document.getElementById('printButton').style.display = 'block'; // or 'visibility: visible;'
    }

    // Add an event listener to the "Print Invoice" button
    document.getElementById('printButton').addEventListener('click', function() {
        // Trigger the print dialog

             this.style.display = 'none';
        window.print();
    });

    // Add an event listener for the afterprint event
    if (window.matchMedia) {
        // Modern browsers support media queries for printing
        window.matchMedia('print').addListener(function(mql) {
            if (!mql.matches) {
                // The print dialog is closed, so handle the afterprint event
                handleAfterPrint();
            }
        });
    } else {
        // Fallback for older browsers
        window.onafterprint = handleAfterPrint;
    }
</script>


</body>
</html>
