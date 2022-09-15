<div class="container">
    <div class="row">
        @foreach ($data as $item)
        <div class="col-3 mt-5">
            <div class="card">
                <img src="{{ asset($item->foto) }}" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">{{$item->name }}</h5>
                  <p class="card-text">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                </div>
                <a href="{{route('pelanggan.detail', $item->id)}}" class="btn btn-primary">Ditel</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

