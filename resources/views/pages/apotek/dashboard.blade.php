@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Dashboard</h3>
        </div>
    </div>

    <div class="row">
     <div class="col-md-6 col-6 col-xs-6 col-xl-3 col-lg-6">
          <div class="card text-white bg-info text-center shadow-lg">
        <div class="card-content">
          <div class="card-body">
            <svg viewBox="0 0 24 24" width="52" height="52" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
            <h2 class="card-text mt-2 text-white"> <strong>{{$kasir}}</strong></h2>
            <h3 class="card-text">Total Karyawan</h3>
          </div>
        </div>
      </div>
    </div>
     <div class="col-md-6 col-6 col-xs-6 col-xl-3 col-lg-6">
          <div class="card text-white bg-warning text-center shadow-lg">
        <div class="card-content">
          <div class="card-body">
            <svg viewBox="0 0 24 24" width="52" height="52" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
              <path d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z"></path>
              <path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"></path>
              <path d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z"></path>
              <path d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"></path>
              <path d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z"></path>
              <path d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"></path>
              <path d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z"></path>
              <path d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z"></path>
            </svg>
            <h2 class="card-text mt-2 text-white"> <strong>{{$merk}}</strong></h2>
            <h3 class="card-text">Total Label</h3>
          </div>
        </div>
      </div>
    </div>
     <div class="col-md-6 col-6 col-xs-6 col-xl-3 col-lg-6">
          <div class="card text-white bg-primary text-center shadow-lg">
        <div class="card-content">
          <div class="card-body">
            <svg viewBox="0 0 24 24" width="52" height="52" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
              <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
              <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
            </svg>
            <h2 class="card-text mt-2 text-white"> <strong>{{$obat}}</strong></h2>
            <h3 class="card-text">Total Produk</h3>
          </div>
        </div>
      </div>
    </div>
     <div class="col-md-6 col-6 col-xs-6 col-xl-3 col-lg-6">
          <div class="card text-white bg-success text-center shadow-lg">
        <div class="card-content">
          <div class="card-body">
            <svg viewBox="0 0 24 24" width="52" height="52" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
              <circle cx="9" cy="21" r="1"></circle>
              <circle cx="20" cy="21" r="1"></circle>
              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <h2 class="card-text mt-2 text-white"> <strong>{{$transaksi}}</strong></h2>
            <h3 class="card-text">Total Transaksi</h3>
          </div>
        </div>
      </div>
    </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                        aria-hidden="true">×</span> </button>
            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
        </div>
    @endif
    <section id="image-gallery" class="card">
        {{--<div class="card-header">--}}
            {{--<h4 class="card-title">Image gallery</h4>--}}
            {{--<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>--}}
            {{--<div class="heading-elements">--}}
                {{--<ul class="list-inline mb-0">--}}
                    {{--<li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
                    {{--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>--}}
                    {{--<li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
                    {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card-content collapse show">--}}
            {{--<div class="card-body">--}}
                {{--<div class="card-text">--}}
                    {{--<p>Image gallery grid with photo-swipe integration. Display images gallery in 4-2-1 columns and photo-swipe provides gallery features.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                <div class="row">
                    <div class="media-left p-1">
                        <a href="{{asset('assets/app-assets/images/gallery/logo.png')}}" itemprop="contentUrl" data-size="480x360">
                            <img class="img-thumbnail img-fluid" src="{{asset('assets/app-assets/images/gallery/logo.png')}}" itemprop="thumbnail" alt="Image description" />
                        </a>
                    </div>
                    <div class="media-body w-100">
                        <section id="description" class="card">
                            <div class="card-header">
                                <h4 class="card-title">Apotek Cemara</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    {{--<ul class="list-inline mb-0">--}}
                                        {{--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>--}}
                                        {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                                    {{--</ul>--}}
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-text">
                                        <p>Apotek Cemara mempunyai visi menjadi apotek terpercaya dengan pelayanan informasi obat terbaik.</p>
                                        <p> <a href="http://photoswipe.com/documentation/getting-started.html" target="_blank"></a> </p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>


                </div>

            </div>
            <!--/ Image grid -->

            {{--<!-- Root element of PhotoSwipe. Must have class pswp. -->--}}
            {{--<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">--}}

                {{--<!-- Background of PhotoSwipe.--}}
                     {{--It's a separate element as animating opacity is faster than rgba(). -->--}}
                {{--<div class="pswp__bg"></div>--}}

                {{--<!-- Slides wrapper with overflow:hidden. -->--}}
                {{--<div class="pswp__scroll-wrap">--}}

                    {{--<!-- Container that holds slides.--}}
                        {{--PhotoSwipe keeps only 3 of them in the DOM to save memory.--}}
                        {{--Don't modify these 3 pswp__item elements, data is added later on. -->--}}
                    {{--<div class="pswp__container">--}}
                        {{--<div class="pswp__item"></div>--}}
                        {{--<div class="pswp__item"></div>--}}
                        {{--<div class="pswp__item"></div>--}}
                    {{--</div>--}}

                    {{--<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->--}}
                    {{--<div class="pswp__ui pswp__ui--hidden">--}}

                        {{--<div class="pswp__top-bar">--}}

                            {{--<!--  Controls are self-explanatory. Order can be changed. -->--}}

                            {{--<div class="pswp__counter"></div>--}}

                            {{--<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>--}}

                            {{--<button class="pswp__button pswp__button--share" title="Share"></button>--}}

                            {{--<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>--}}

                            {{--<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>--}}

                            {{--<!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->--}}
                            {{--<!-- element will get class pswp__preloader-active when preloader is running -->--}}
                            {{--<div class="pswp__preloader">--}}
                                {{--<div class="pswp__preloader__icn">--}}
                                    {{--<div class="pswp__preloader__cut">--}}
                                        {{--<div class="pswp__preloader__donut"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">--}}
                            {{--<div class="pswp__share-tooltip"></div>--}}
                        {{--</div>--}}

                        {{--<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">--}}
                        {{--</button>--}}

                        {{--<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">--}}
                        {{--</button>--}}

                        {{--<div class="pswp__caption">--}}
                            {{--<div class="pswp__caption__center"></div>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!--/ PhotoSwipe -->
    </section>

@endsection
