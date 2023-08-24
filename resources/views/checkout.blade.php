<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ config('midtrans.client_key') }}"></script>
    <title>Toko Durian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <h1 class="my-3">Toko Durian</h1>
    <div class="card" style="width: 18rem;">
  <img src="{{ url('assets/img/durian.jpg') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Detail Pesanan</h5>
    <table class="table table-responsive table-hover">
        <tr>
            <td>Nama</td>
            <td>: {{ $order->name }}</td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td>: {{ $order->phone }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $order->address }}</td>
        </tr>
        <tr>
            <td>Qty</td>
            <td>: {{ $order->qty }}</td>
        </tr>
        <tr>
            <td>Total Harga</td>
            <td>: {{ $order->price }}</td>
        </tr>
    </table>
    <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
  </div>
</div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}');
          // customer will be redirected after completing payment pop-up
        });
      </script>
  </body>
</html>
