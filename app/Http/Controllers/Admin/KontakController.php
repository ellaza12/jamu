<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
    public function read() {
        return DB::table('kontak')->get();
    }

     public function admin()
    {
        $kontak = DB::table('kontak')->get();
        return view('admin.kontak.index', ['kontak' => $kontak]);
    }

    public function add()
    {
        return view('admin.kontak.tambah');
    }

    public function create(Request $request) {
        DB::table('kontak')->insert([
            'alamat' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/admin/kontak')->with("success",'Data Berhasil Ditambahkan !');
    }

     public function edit($id)
    {
        $kontak = DB::table('kontak')->where('id', $id)->first();
        return view('admin.kontak.edit', ['kontak' => $kontak]);
    }

    public function update(Request $request, $id) {
        DB::table('kontak')
        ->where('id', $id)
        ->update([
            'alamat'=> $request->alamat,
            'no_tlp'=> $request->no_tlp,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/admin/kontak')->with("success", 'Data Berhasil Diedit !');
    }

    public function delete($id){
        DB::table('kontak')->where('id',$id)->delete();

        return redirect('/admin/kontak')->with("success", 'Data Berhasil Dihapus !');
    }
}
