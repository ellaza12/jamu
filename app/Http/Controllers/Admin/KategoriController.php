<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function read()
    {
        return DB::table('kategori')->get();
    }

     public function admin()
    {
        $kategori = DB::table('kategori')->get();
        return view('admin.kategori.index', ['kategori' => $kategori]);
    }

     public function add()
    {
        return view('admin.kategori.tambah');
    }

    public function create(Request $request) {
        DB::table('kategori')->insert([
            'nama' => $request->nama,
        ]);

        return redirect('/admin/kategori')->with("success",'Data Berhasil Ditambahkan !');
    }

     public function edit($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();
        return view('admin.kategori.edit', ['kategori' => $kategori]);
    }

    public function update(Request $request, $id) {
        DB::table('kategori')
        ->where('id', $id)
        ->update([
            'nama'=> $request->nama,
        ]);

        return redirect('/admin/kategori')->with("success", 'Data Berhasil Diedit !');
    }

    public function delete($id){
        DB::table('kategori')->where('id',$id)->delete();

        return redirect('/admin/kategori')->with("success", 'Data Berhasil Dihapus !');
    }

}
