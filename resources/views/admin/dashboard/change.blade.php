@extends('admin.layouts.app', [
    'activePage' => 'change',
])

@section('content')
<div class="my-3 my-md-5">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="page-title" style="font-size: 20px">Ganti Password</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fe fe-lock mr-2"></i> Password</h3>
                    </div>
                    <div class="card-body">
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
                        <form action="/admin/change_password" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="current-password">Password Lama</label>
                                <input type="password" name="current_password" class="form-control" placeholder="Masukkan Password Lama ....." required>
                            </div>
                            
                            <div class="form-group">
                                <label for="new-password">Password Baru</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Masukkan Password Baru ....." required>
                            </div>
                            
                            <div class="form-footer text-left mt-2">
                                <button type="submit" class="btn" style="background-color: #3cb815; color:white">
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
