@extends('admin.layouts.app', [
    'activePage' => 'kategori',
])

@section('content')
<div class="my-3 my-md-5">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="page-title" style="font-size: 20px">Data Kategori Jamu</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card p-3" style="border-radius: 10px; min-height: 200px;">
                   <div class="card-header d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title"><i class="fe fe-lock"></i> List Data Kategori </h3>
                    <a href="/admin/kategori/add" class="btn btn-sm" style="background-color: #3cb815; color:white"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            <table class="table table-striped table-bordered data-table hover">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">#</th>
                        <th class="text-center" width="30%">Nama</th>
                        <th class="text-center" width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                     @foreach ($kategori as $data)
                     
                     <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $data->nama }}</td>
                    </td>
                    <td class="text-center" width="15%">
                        <a href="/admin/kategori/edit/{{$data->id}}">
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

@endsection
