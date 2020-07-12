<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="{{asset('assets/app-assets/images/backgrounds/05.jpg')}}">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="{{asset('assets/app-assets/images/logo/000.png')}}"/>
                    <h3 class="brand-text">Apotek Cemara</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a class="@if(Request::is('apotek/dashboard')) active @endif" href="{{route('apotek.dashboard')}}"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>
            <li class="nav-item"><a class="@if(Request::is('apotek/merk') || Request::is('apotek/merk/*'))  active @endif" href="{{route('apotek.merk.index')}}"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="">Label</span></a>
            </li>
            <li class="nav-item"><a class="@if(Request::is('apotek/obat') || Request::is('apotek/obat/*')) active @endif" href="{{route('apotek.obat.index')}}"><i class="ft-briefcase"></i><span class="menu-title" data-i18n="">Produk</span></a>
            </li>
            <li class="nav-item"><a class="@if(Request::is('apotek/transaksi')) active @endif" href="{{route('apotek.transaksi.index')}}"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Transaksi</span></a>
            </li>
            <li class="nav-item"><a class="@if(Request::is('apotek/karyawan')) active @endif" href="{{route('apotek.karyawan.index')}}"><i class="ft-users"></i><span class="menu-title" data-i18n="">Karyawan</span></a>
            </li>
            <li class="nav-item"><a class="@if(Request::is('apotek/penjualan')) active @endif" href="{{ route('apotek.penjualan.index') }}"><i class="ft-list"></i><span class="menu-title" data-i18n="">Penjualan</span></a>
            </li>
            <li class="nav-item"><a class="@if(Request::is('apotek/pelanggan')) active @endif" href="{{route('apotek.pelanggan.index')}}"><i class="ft-user"></i><span class="menu-title" data-i18n="">Pelanggan</span></a>
            </li>
        </ul>
    </div>
</div>
