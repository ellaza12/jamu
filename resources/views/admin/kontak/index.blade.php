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
                        <h4 class="page-title" style="font-size: 20px">Data Kontak</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card p-3" style="border-radius: 10px; min-height: 200px;">
                   <div class="card-header d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title"><i class="fe fe-lock"></i> List Data Kontak </h3>
                    <a href="/admin/kontak/add" class="btn btn-sm" style="background-color: #3cb815; color:white"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            <table class="table table-striped table-bordered data-table hover">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">#</th>
                        <th class="text-center" width="20%">Alamat</th>
                        <th class="text-center" width="20%">No Telepon</th>
                        <th class="text-center" width="20%">Keterangan</th>
                        <th class="text-center" width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                     @foreach ($kontak as $data)
                     <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->no_tlp }}</td>
                        <td>{{ $data->keterangan }}</td>
                    </td>
                    <td class="text-center" width="15%">
                        <a href="/admin/kontak/edit/{{$data->id}}">
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


@foreach ($kontak as $data)
<div class="modal fade" id="data-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <h3 class="text-center">
            Apakah Anda Yakin Menghapus Data Ini ?
            <h3>
            <hr>
            <div class="form-group">
               <label for="exampleInputUsername1">Alamat</label>
               <label class="form-control">{{$data->alamat}}</label>
             </div>
             <div class="row mt-4">
               <div class="col-md-6">
                  <a href="/admin/kontak/delete/{{$data->id}}" style="text-decoration: none;">
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