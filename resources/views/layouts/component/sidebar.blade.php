<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        {{-- Penjual --}}
        @if (auth()->user()->role == 'penjual')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('home') ? '' : 'collapsed' }}" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End dashboard  -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('penjual/jenis-barang') ? 'active' : 'collapsed' }}"
                href="{{route('Penjual.jenis-barang.index')}}">
                <i class="bi bi-person-exclamation"></i><span>Jenis Barang</span>
            </a>
        </li><!-- End konfirmasi Akun -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('penjual/barang') ? 'active' : 'collapsed' }}"
                href="{{route('Penjual.barang.index')}}">
                <i class="bi bi-gear-fill"></i><span>Barang</span>
            </a>
        </li><!-- Setting -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('penjual/barang-terjual') ? 'active' : 'collapsed' }}"
                href="{{route('Penjual.barang-terjual.index')}}">
                <i class="bi bi-envelope-paper"></i><span>Barang Terjual</span>
            </a>
        </li><!-- Setting -->

        @endif

    </ul>

</aside><!-- End Sidebar-->
