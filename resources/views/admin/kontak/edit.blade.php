@extends('admin.layouts.app', [
    'activePage' => 'kontak',
])

@section('content')
<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="page-title" style="font-size: 20px;">Edit Data Kontak</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fe fe-user mr-2"></i> Data Kontak
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
                        <form action="/admin/kontak/update/{{ $kontak->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                       <input type="text" autofocus name="alamat" required class="form-control" placeholder="Masukkan alamat ....." value="{{ $kontak->alamat }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="text" autofocus name="no_tlp" required class="form-control" placeholder="Masukkan No Telepon ....." value="{{ $kontak->no_tlp }}">
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" autofocus name="keterangan" required class="form-control" placeholder="Masukkan Keterangan ....." value="{{ $kontak->keterangan }}">
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
