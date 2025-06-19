<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jamu Sehat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/animate/animate.min.css" rel="stylesheet">
    <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>Kab. Tanah Datar, Sumbar</small>
                {{-- <small class="ms-4"><i class="fa fa-envelope me-2"></i>jamu@gmail.com</small> --}}
            </div>
            {{-- <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div> --}}
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                 <img src="{{ asset('asset/img/jaaaa.jpg') }}" style="width: 100px; height: 40px">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <a href="#about" class="nav-item nav-link">Tentang Kami</a>
                    <a href="#video" class="nav-item nav-link">Video</a>
                    <a href="#produk" class="nav-link">Produk</a>
                    <a href="#galeri" class="nav-item nav-link">Galeri</a>
                    <a href="#blog" class="nav-item nav-link">Blog</a>
                    <a href="#artikel" class="nav-item nav-link">Artikel</a>
                    <a href="#kontak" class="nav-item nav-link">Kontak</a>
                </div>
                {{-- <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                </div> --}}
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    {{-- profil --}}
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            @foreach ($profil as $index => $p)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img class="w-100" src="{{ asset('public/profil/' . $p->foto) }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h3 class="display-2 mb-2 animated slideInDown">{{ $p->tulisan1 }}</h3>
                                    <p class="animated slideInDown text-dark">{{ $p->tulisan2 }}</p>
                                    <a href="#produk" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- profil end --}}

    <section id="about" style="padding-top:80px;">  
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                @foreach($about as $a)
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                       <img src="{{ asset('public/about/' . $a->foto) }}" style="height: 430px; width:530px" alt="Foto"> <div class="topic-content-box">
                    </div>
                </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Tentang Kami</h1>
                     @php
                        $paragraf = explode('::', $a->keterangan);
                    @endphp
                    @if (!empty($paragraf[0]))
                        <p class="mb-4">{{ $paragraf[0] }}</p>
                    @endif
                    @if (!empty($paragraf[1]))
                        <p class="mb-4">{{ $paragraf[1] }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- About End -->
    </section>

    <section id="video" style="padding-top:80px;">
    <!-- Feature Start -->
    <div class="container-fluid bg-light bg-icon my-5 py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Video Tutorial</h1>
                <p>Temukan berbagai video tutorial yang informatif dan bermanfaat.</p>
            </div>

            <div class="owl-carousel video-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach($video as $v)
            <div class="bg-white text-center p-3">
                <div style="background-color: rgba(255, 255, 255, 0.9); padding: 10px;">
                    <div class="ratio ratio-16x9 mb-3">
                        <iframe
                            src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($v->link_video, 'v=') }}"
                            title="{{ $v->nama }}" allowfullscreen></iframe>
                    </div>
                    <h6 class="mb-2">{{ $v->nama }}</h6>
                    <a class="btn btn-outline-primary btn-sm border-2 rounded-pill"
                    href="https://www.youtube.com/watch?v={{ \Illuminate\Support\Str::after($v->link_video, 'v=') }}"
                    target="_blank">Tonton di YouTube</a>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    <!-- Feature End -->
</section>



<section id="produk" style="padding-top:80px;">
    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Produk Jamu</h1>
                        <p>Beberapa Macam Jamu Nusantara</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-1">Jamu</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show active p-0">
                    <div class="owl-carousel produk-carousel wow fadeInUp" data-wow-delay="0.1s">
                        @foreach($produk as $item)
                        <div class="product-item bg-light d-flex flex-column shadow-sm mx-2">
                            <div class="position-relative overflow-hidden" style="height: 200px; overflow: hidden; border-radius: 10px;">
                                <img class="img-fluid w-100 h-100 object-fit-cover" src="{{ asset('public/produk/' . $item->foto) }}" alt="{{ $item->nama }}">
                            </div>
                            <div class="text-center p-4 flex-grow-1 d-flex flex-column">
                                <a class="d-block h5 mb-2">{{ $item->nama }}</a>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-outline-primary btn-sm border-2 rounded-pill mb-3"
                                    href="{{ route('landingpage.detailproduk', ['id' => $item->id]) }}"
                                    style="max-width: 150px; width: auto;">
                                    Detail Produk
                                    </a>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Product End -->
</section>



    {{-- <!-- Firm Visit Start -->
    <div class="container-fluid bg-primary bg-icon mt-5 py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-5 text-white mb-3">Visit Our Firm</h1>
                    <p class="text-white mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
                </div>
                <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                    <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="">Visit Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Firm Visit End --> --}}

<section id="galeri">
    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Galeri Bahan Jamu</h1>
                <p>Bahan-bahan untuk pembuatan Jamu</p>
            </div>

            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="1.0s">
                @foreach ($galeri as $item)
                <div class="testimonial-item position-relative bg-white p-4 text-center" style="height: 330px;">
                    <div class="position-relative mx-auto mb-3" style="width: 100%; height: 200px; overflow: hidden; border-radius: 10px;">
                        <img class="img-fluid w-100 h-100 object-fit-cover" src="{{ asset('public/galeri/' . $item->foto) }}" alt="{{ $item->nama }}">
                    </div>
                    <h5 class="mb-3">{{ $item->nama }}</h5>
                     <div class="d-flex justify-content-center">
                                 <a class="btn btn-outline-primary btn-sm border-2 rounded-pill mb-3"
                                    href="{{ route('landingpage.detailgaleri', ['id' => $item->id]) }}"
                                    style="max-width: 150px; width: auto;">
                                    Detail Galeri
                                    </a>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
</section>

    <section id="blog" style="padding-top:80px;">  
    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Blog</h1>
                <p>Beberapa hal mengenai Jamu</p>
            </div>
             <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show active p-0">
                    <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.1s">
                        @foreach($blog as $blog)
                        <div class="product-item bg-light w-100 d-flex flex-column shadow-sm mx-2">
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                <img class="img-fluid w-100 h-100 object-fit-cover" src="{{ asset('public/blog/' . $blog->bg_foto) }}" alt="{{ $blog->nama }}">
                            </div>
                            <div class="text-muted p-4 flex-grow-1 d-flex flex-column">
                                <a class="d-block h5 lh-base mb-4" href="{{ $blog->link_blog }}" target="_blank" rel="noopener noreferrer">
                                    {{ $blog->nama }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
</section>

<section id="artikel">
    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 mb-0">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Artikel</h1>
                <p>Artikel Mengenai Edukasi Kesehatan</p>
            </div>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show active p-0">
                    <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.1s">
                        @foreach($artikel as $artikel)
                        <div class="product-item bg-white w-100 d-flex flex-column shadow-sm mx-2">
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                <img class="img-fluid w-100 h-100 object-fit-cover" src="{{ asset('public/artikel/' . $artikel->bg_foto) }}" alt="{{ $artikel->nama }}">
                            </div>
                            <div class="text-muted p-4 flex-grow-1 d-flex flex-column">
                                <a class="d-block h5 lh-base mb-4" href="{{ $artikel->link_artikel }}" target="_blank" rel="noopener noreferrer">
                                    {{ $artikel->nama }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    <!-- Testimonial End -->
</section>


<section id="kontak">
        <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-3 pt-3 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-3">
                 <div class="col-lg-4 col-md-8">
                    <h4 class="text-light mb-4">Address</h4>
                    @foreach ($kontak as $k)
                    <p><i class="fa fa-map-marker-alt me-3"></i>{{ $k->alamat }}</p>
                    <p><i class="fa fa-phone-alt me-3"></i>{{ $k->no_tlp }}</p>
                </div>
                <div class="col-lg-4 col-md-8">
                    <h4 class="text-light mb-4">Links</h4>
                    <a class="btn btn-link" href="#about">Tentang Kami</a>
                    <a class="btn btn-link" href="#video">Video</a>
                    <a class="btn btn-link" href="#produk">Produk</a>
                    <a class="btn btn-link" href="#galeri">Galeri</a>
                    <a class="btn btn-link" href="#blog">Blog</a>
                    <a class="btn btn-link" href="#artikel">Artikel</a>
                </div>
                <div class="col-lg-4 col-md-8">
                    <h1 class="fw-bold text-primary mb-4">J<span class="text-secondary">a</span>mu</h1>
                    <p>{{ $k->keterangan }}</p>
                     @endforeach
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center text-md-muted mb-3 mb-md-0">
                        &copy; <a href="#">Jamu</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</section>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/lib/wow/wow.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="asset/js/main.js"></script>
</body>

</html>