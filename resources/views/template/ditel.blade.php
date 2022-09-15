<div class="container mt-5">
    <form action="{{route('pelanggan.postkeranjang',$produk->id)}}" method="POST">
    @csrf
    <div class="row">

        <div class="col-4">
            <div class="card">
                <img src="{{ asset($produk->foto) }}" class="card-img-top">
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$produk->name }}</h3>
                    <p class="card-text">Rp. {{number_format($produk->harga, 0, ',', '.') }}</p>
                    <input type="number" name="banyak" id="" class="form-control" placeholder="banyak" required>
                    <hr>
                    <h5>Keterangan : </h5>
                    <p>Ini merupakan ditel dari barang yang di jual silahkan pelajari dengan seksama. Barang yang sudah dibeli tidak boleh dikembalikan</p>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5>Kategori : {{ $produk->kategori->name }}</h5>
                    <img src="" alt="" class="card-img-top">
                </div>
            </div>
            <button class="btn btn-success mt-3 form-control">Beli</button>
        </div>

    </div>
</form>
</div>
