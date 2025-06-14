@extends('admin.layouts.app', [
'activePage' => 'dashboard',
])

@section('content')

<div class="my-3 my-md-5">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="page-title" style="font-size: 20px">Dashboard Admin</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card p-4" style="border-radius: 10px; min-height: 250px;">
                    <div class="card-header d-flex justify-content-between align-items-center mb-3">
                        <h3 class="card-title">Selamat Datang di Dashboard <strong>Jamu Sehat</strong></h3>
                         <!-- Ganti 'logo-jamu.png' dengan path logo kamu -->
                         <img src="{{ asset('asset/img/jaaaa.jpg') }}" style="width: 100px; height: 40px">
                    </div>

                    <div class="text-start">
                       

                       <p style="font-size: 16px; max-width: 1100px; margin: 0 auto; text-align: justify;">
                          <strong>Jamu</strong> adalah minuman tradisional khas Indonesia yang dibuat dari bahan-bahan alami seperti akar-akaran, daun-daunan, dan rempah-rempah. 
                          Selain sebagai minuman herbal, jamu juga dipercaya memiliki berbagai manfaat untuk menjaga kesehatan, meningkatkan daya tahan tubuh, dan membantu proses penyembuhan secara alami.
                      </p>
                      <br>
                      <p style="font-size: 16px; max-width: 1100px; margin: 0 auto; text-align: justify;">
                        <strong>Seiring </strong> perkembangan zaman, jamu tidak hanya dikonsumsi secara tradisional, tetapi juga telah dikemas dalam bentuk yang lebih modern seperti kapsul, serbuk, dan minuman siap saji. 
                        Meskipun demikian, nilai budaya dan khasiat alami dari jamu tetap dijaga, menjadikannya warisan leluhur yang terus dilestarikan dan digemari oleh berbagai kalangan.
                    </p>
                    </div>

                </div>
            </div> 
        </div>

    </div>
</div>

@endsection