@extends('admin.layouts.app', [
    'activePage' => 'produk',
])

@section('content')
<div class="my-3 my-md-5">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="page-title" style="font-size: 20px">Data Produk</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card p-3" style="border-radius: 10px; min-height: 200px;">
                   <div class="card-header d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title"><i class="fe fe-lock"></i> List Data Produk </h3>
                    <a href="/admin/produk/add" class="btn btn-sm" style="background-color: #3cb815; color:white"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            <table class="table table-striped table-bordered data-table hover">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">#</th>
                        <th class="text-center" width="20%">Nama</th>
                        <th class="text-center" width="20%">Kategori</th>
                        <th class="text-center" width="20%">Foto</th>
                        <th class="text-center" width="20%">Deskripsi</th>
                        <th class="text-center" width="20%">Manfaat</th>
                        <th class="text-center" width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                     @foreach ($produk as $data)
                    <?php 
                      $kategori= DB::table('kategori')->find($data->id_kategori);
                    ?>
                     <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $kategori ? $kategori->nama : 'Kategori Tidak Ditemukan' }}</td>
                        <td class="text-center">
                            @if($data->foto == "")
                            <a href="{{url('assets-admin/vendors/images/user.png')}}" target="_blank">
                                <img src="{{url('assets-admin/vendors/images/user.png')}}" class="rounded" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
                            </a>
                            @else
                            <a href="{{url('public/produk')}}/{{$data->foto}}" target="_blank">
                                <img src="{{ url('public/produk/' . $data->foto) }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
                            </a>
                            @endif
                        </td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>{{ $data->manfaat }}</td>
                    </td>
                    <td class="text-center" width="15%">
                        <a href="/admin/produk/edit/{{$data->id}}">
                    <button class="btn btn-success btn-xs">
                        <i class="fa fa-edit" data-toggle="tooltip" data-placement="top"
                        title="Edit Data"></i>
                    </button>
                  </a>
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#data-{{ $data->id }}">
                     <i class="fa fa-trash" data-toggle="tooltip" data-placement="top"
                     title="Delete Data"></i>
                  </button>
               </td>
            </tr>
            @endforeach
                </tbody>
            </table>
        </div>
                </div> 
            </div>
        </div>
    </div>
</div> 

@foreach ($produk as $data)
<div class="modal fade" id="data-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <h3 class="text-center">
            Apakah Anda Yakin Menghapus Data Ini ?
            <h3>
            <hr>
            <div class="form-group">
               <label for="exampleInputUsername1">Nama Produk</label>
               <label class="form-control">{{$data->nama}}</label>
             </div>
             <div class="row mt-4">
               <div class="col-md-6">
                  <a href="/admin/produk/delete/{{$data->id}}" style="text-decoration: none;">
                  <button type="button" class="btn btn-success btn-block">Ya</button>
                  </a>
               </div>
               <div class="col-md-6">
                  <button type="button" class="btn btn-danger btn-block" data-dismiss="modal" aria-label="Close">Tidak</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endforeach
@endsection
