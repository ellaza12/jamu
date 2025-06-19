<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Foody - Organic Food Website Template</title>
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
<link href="/asset/css/bootstrap.min.css" rel="stylesheet">
<link href="/asset/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Detail Galeri Jamu</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                             <a href="/"><i class="fa fa-arrow-left"></i> Back</a>
                        </li>
                    </ul>
                </div>
                <div class="align-items-stretch wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item bg-light w-100 d-flex flex-row shadow-sm">
                        <div class="position-relative overflow-hidden" style="height: 300px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('public/galeri/' . $galeri->foto) }}" alt="{{ $galeri->nama }}">
                        </div>
                        <div class="text-start p-4 flex-grow-1 d-flex flex-column">
                            <a class="d-block h5 mb-2">{{ $galeri->nama }}</a>
                            <h6 class="text-primary fw-semibold mt-3">Deskripsi</h6>
                            <small class="text-muted d-block mb-2" style="text-align: justify;">
                                {{ $galeri->deskripsi }}
                            </small>
                            <h6 class="text-primary fw-semibold mt-3">Manfaat</h6>
                            <ul class="text-muted mb-0" style="padding-left: 1.2rem;">
                                @foreach(explode(',', $galeri->manfaat) as $manfaat)
                                    <li><small>{{ trim($manfaat) }}</small></li>
                                @endforeach
                            </ul>
                            <div class="galeri-item mt-2">
                                <small class="text-muted">
                                    <i class="fas fa-eye me-1"></i> {{ $galeri->view }}x dilihat
                                </small>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

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