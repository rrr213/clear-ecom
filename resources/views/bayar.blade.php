<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ditel Produk</title>
</head>
<body>
        @include('template.nav')

        <form action="{{ route('pelanggan.prosesbayar', $diteltransaksi->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container mt-5">
                <h5>Upload Bukti Pembayaran</h5>
                <hr>
                <div class="row">

                    <div class="col-4">
                        <div class="card">
                            <img src="{{ asset($produk->foto) }}" class="card-img-top">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{$produk->name }}</h3>
                                <hr>
                                <p class="card-text">Rp. {{number_format($produk->harga, 0, ',', '.') }}</p>
                                <p class="card-text">Rp. {{number_format($diteltransaksi->totalharga, 0, ',', '.') }}</p>
                                <p class="card-text">Banyak : {{$diteltransaksi->qty}}</p>
                                <hr>
                                <div class="mb-2" >
                                    <label class="form-control"><b>Bukti Pembayaran</b></label>
                                    <input type="file" name="bukti_transaksi" accept="image/*" required>
                                </div>
                                <hr>
                                <h5>Keterangan : </h5>
                                <p>Silahkan lakukan transper ke bang berikut dan tunggu konfirmasi dari kami</p>
                                <button class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
