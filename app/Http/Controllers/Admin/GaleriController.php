<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{

    public function read()
    {
        return DB::table('galeri')->get();
    }

    public function find($id)
    {
        return DB::table('galeri')->where('id', $id)->first();
    }

    public function admin()
    {
        $galeri = DB::table('galeri')->get();
        return view('admin.galeri.index', ['galeri' => $galeri]);
    }

    public function add()
    {
        return view('admin.galeri.tambah');
    }

    public function create(Request $request)
    {
        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path() . "/public/galeri",$nama_foto);

            DB::table('galeri')->insert([
                'nama' => $request->nama,
                'foto' => $nama_foto,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat
            ]);
        } else {
            DB::table('galeri')->insert([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat
            ]);
        }

        return redirect('admin/galeri')->with("success", "Data Berhasil Ditambah !");
    }

    public function edit($id)
    {
        $galeri = DB::table('galeri')->where('id', $id)->first();
        return view('admin.galeri.edit', ['galeri' => $galeri]);
    }

    public function update(Request $request, $id)
    {
        $galeri = DB::table('galeri')->where('id',$id)->first();

        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if (!empty($galeri->foto)) {
                $filePath = public_path('public/galeri/' . $galeri->foto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Simpan file baru
            $foto = $request->file('foto');
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path('public/galeri'), $nama_foto);

            DB::table('galeri')  
                ->where('id', $id)
                ->update([
                'nama' => $request->nama,
                'foto' => $nama_foto,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat
            ]);
        } else {
            DB::table('galeri')  
                ->where('id', $id)
                ->update([
                
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat
            ]);
        }

        return redirect('/admin/galeri')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id) {

        $galeri= DB::table('galeri')->where('id',$id)->first();
        DB::table('galeri')->where('id',$id)->delete();

        return redirect('/admin/galeri')->with("success","Data Berhasil Didelete !");

        
    }

}
