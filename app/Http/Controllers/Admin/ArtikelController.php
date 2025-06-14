<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
      public function read()
    {
        return DB::table('artikel')->get();

    }

     public function admin()
    {
        $artikel = DB::table('artikel')->get();
        return view('admin.artikel.index', ['artikel' => $artikel]);
    }

    public function add()
    {
        return view('admin.artikel.tambah');
    }

    public function create(Request $request)
    {
        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path() . "/public/artikel",$nama_foto);

            DB::table('artikel')->insert([
                'nama' => $request->nama,
                'link_artikel' => $request->link_artikel,
                'bg_foto' => $nama_foto
            ]);
        } else {
            DB::table('artikel')->insert([
                'nama' => $request->nama,
                'link_artikel' => $request->link_artikel,
            ]);
        }

        return redirect('admin/artikel')->with("success", "Data Berhasil Ditambah !");
    }

     public function edit($id)
    {
        $artikel = DB::table('artikel')->where('id', $id)->first();
        return view('admin.artikel.edit', ['artikel' => $artikel]);
    }

  public function update(Request $request, $id)
{
    $artikel = DB::table('artikel')->where('id', $id)->first();

    if ($request->hasFile('bg_foto')) {
        // Hapus file lama jika ada
        if (!empty($artikel->bg_foto)) {
            $filePath = public_path('public/artikel/' . $artikel->bg_foto);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Simpan file baru
        $foto = $request->file('bg_foto');
        $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
        $foto->move(public_path('public/artikel'), $nama_foto);

        DB::table('artikel')  
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'link_artikel' => $request->link_artikel,
                'bg_foto' => $nama_foto
            ]);
    } else {
        // Update tanpa mengubah foto
        DB::table('artikel')  
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'link_artikel' => $request->link_artikel,
                'bg_foto' => $artikel->bg_foto // tetap pakai foto lama
            ]);
    }

    return redirect('/admin/artikel')->with("success","Data Berhasil Diupdate !");
}

    public function delete($id) {
        $artikel= DB::table('artikel')->where('id',$id)->first();
        if (!empty($artikel->foto)) {
            $filePath = public_path('public/artikel/' . $artikel->foto);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        DB::table('artikel')->where('id',$id)->delete();

        return redirect('admin/artikel')->with("success","Data Berhasil Didelete !");
    }   
}
