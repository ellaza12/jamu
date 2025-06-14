@extends('admin.layouts.app', [
    'activePage' => 'artikel',
])

@section('content')
<div class="my-3 my-md-5">
    <div class="container">

        <!-- Judul Halaman -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="page-title" style="font-size: 20px;">Edit Data Artikel</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Tambah artikel -->
        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fe fe-user mr-2"></i> Data Artikel
                        </h3>
                    </div>
                    <div class="card-body">

                        <!-- Alert -->
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- Form Input -->
                        <form action="/admin/artikel/update/{{ $artikel->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                           <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label>Nama</label>
                  <input type="text" autofocus name="nama" required class="form-control"
                     placeholder="Masukkan Nama artikel ....." value="{{ $artikel->nama }}">
               </div>
               <div class="form-group">
                  <label>Link artikel</label>
                  <input type="text" autofocus name="link_artikel" required class="form-control"
                     placeholder="Masukkan Link artikel ....." value="{{ $artikel->link_artikel }}">
               </div>
            </div>
            <div class="col-md-6">
               <div class="row">
                  <div class="col-md-8">
                     <div class="form-group">
                        <label>Background Foto</label>
                        <div class="custom-file">
                           <input type="file" id="fotoInput" name="bg_foto" class="custom-file-input" accept="image/*" onchange="previewImage(event)">
                           <label class="custom-file-label">Choose file</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label style="color:white;">.</label>
                        <a href="{{url('public/artikel')}}/{{$artikel->bg_foto}}" target="_blank" class="btn btn-md btn-dark btn-block"><i class="fa fa-image"></i> Lihat Foto</a>     
                     </div>
                  </div>
               </div>
            </div>
            
         </div>

                            <!-- Tombol Simpan -->
                            <div class="form-footer text-left mt-2">
                                <button type="submit" class="btn" style="background-color: #3cb815; color: white;">
                                    <i class="fe fe-save mr-1"></i> Simpan Data
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
