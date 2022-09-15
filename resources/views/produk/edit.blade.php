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
            <form action="{{ route('admin.updateproduk', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3 class="text-center">Silahkan Isi Edit Data Produk</h3>
                <hr>
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" required name="name" value="{{ $produk->name }}">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Harga </label>
                    <input type="number" class="form-control" required name="harga" value="{{ $produk->harga }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <br>
                    <input type="file" name="foto" accept="image/*" class="btn btn-outline-secondary">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Kategori </label>
                    <select name="kategori_id" class="form-control">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>


        <div class="fixed-bottom">
            @include('template.footer')
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
