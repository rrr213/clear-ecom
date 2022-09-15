<nav class="nav bg-dark fixed-top">
    <a class="nav-link active text-white" href="{{ route('home') }}">Ujikom-RPL</a>
    @guest
        <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
        <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
    @endguest
    @auth
        @if (auth()->user()->role == 'admin')
            <a class="nav-link text-white" href="{{ route('admin.produk') }}">Produk</a>
        @else
            <a class="nav-link text-white" href="{{ route('pelanggan.keranjang') }}">Keranjang</a>
            <a class="nav-link text-white" href="{{ route('pelanggan.summary') }}">Summary</a>
        @endif
        <a class="nav-link text-white" href="{{ route('logout') }}">Logout</a>
    @endauth
</nav>
