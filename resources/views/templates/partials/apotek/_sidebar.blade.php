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
            <li class=" nav-item"><a href="{{route('apotek.dashboard')}}"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('apotek.merk.index')}}"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="">Merk</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('apotek.obat.index')}}"><i class="ft-folder"></i><span class="menu-title" data-i18n="">Obat</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('apotek.transaksi.index')}}"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Transaksi</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('apotek.karyawan.index')}}"><i class="ft-user"></i><span class="menu-title" data-i18n="">Managment</span></a>
            </li>
        </ul>
    </div>
</div>