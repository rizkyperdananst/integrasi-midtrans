<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Durian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <h1 class="my-3">Toko Durian</h1>
    <div class="card" style="width: 18rem;">
  <img src="{{ url('assets/img/durian.jpg') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Durian Lokal</h5>
    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos consequatur culpa in iure at praesentium sit repellat fugit atque alias.</p>
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="qty" class="form-label">Mau Pesan Berapa ?</label>
                <input type="number" name="qty" id="qty" class="form-control">
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Nama Pelanggan</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone" class="form-label">Nomor HP</label>
                <input type="number" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
            </div>
        <button type="submit" class="btn btn-primary">Checkout</button>
    </form>
  </div>
</div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
