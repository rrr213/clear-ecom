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

        <div class="container mt-5">
            <h5>Keranjang</h5>
            @if(Session::has('status'))
                <div> <span style="color: red">{{Session::get('status')}}</span></div>
            @endif
            <hr>
                @foreach ($diteltransaksi as $item)
                <div class="card mt-3">
                <div class="row">

                    <div class="col-2 p-4">
                        <img src="{{ asset($item->produk->foto) }}" class="img-thumbnail ">
                    </div>

                    <div class="col-8">
                        <div class="card-body">
                           <h3 class="card-title">{{$item->produk->name }}</h3>
                           <hr>
                           <p class="card-text">Harga Rp. {{number_format($item->produk->harga, 0,',','.')}}</p>
                           <input type="number" name="banyak" id="" class="form-control" value="{{$item->qty }}" required>
                           <hr>
                           <p class="card-text">Total Rp. {{number_format($item->totalharga,0,',','.')}}</p>
                        </div>
                    </div>

                    <div class="col-2 p-5">
                        <a href="{{ route('pelanggan.bayar',$item->id) }}" class="btn btn-info">Bayar</a>
                    </div>
                </div>
                </div>
                @endforeach
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
