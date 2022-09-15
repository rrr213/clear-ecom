<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Produk</title>
</head>
<body>
        @include('template.nav')

        <div class="container mt-5">
            @if(Session::has('status'))
                <div> <span style="color: red">{{Session::get('status')}}</span></div>
            @endif
            <a href="{{ route('admin.tampiltambahproduk') }}" class="btn btn-primary">Tambah</a>
            <table class="table table-responsive-sm mt-3">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $item)
                    <tr>
                        <td>
                            <img src="{{ asset($item->foto) }}" width="100" height="100">
                        </td>
                        <td>{{  $item->name }}</td>
                        <td>{{  number_format($item->harga, 0,',','.') }}</td>
                        <td>
                            <a href="{{ route('admin.editproduk', $item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('admin.deleteproduk', $item->id) }}" class="btn btn-danger" onclick="return confirm('yakin ingin dihapus')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="">{{ $produk->render() }}</div>
        </div>


        @include('template.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
