<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    
    public function read()
    {
        return DB::table('profil')->get();
    }

    public function admin()
    {
        $profil = DB::table('profil')->get();
        return view('admin.profil.index', ['profil' => $profil]);
    }

    public function add(){
        return view('admin.profil.tambah');
    }

    public function create(Request $request)
    {
        $foto = $request->file('foto');
          if ($request->hasFile('foto')) {
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path() . "/public/profil", $nama_foto);

            DB::table('profil')->insert([
                'tulisan1' => $request->tulisan1,
                'tulisan2' => $request->tulisan2,
                'foto' => $nama_foto
            ]);
        } else {
            DB::table('profil')->insert([
                'tulisan1' => $request->tulisan1,
                'tulisan2' => $request->tulisan2,
            ]);
        }

        return redirect('admin/profil')->with("success", "Data Berhasil Ditambah !");
    }

    public function edit($id)
    {
        $profil = DB::table('profil')->where('id', $id)->first();
        return view('admin.profil.edit', ['profil' => $profil]);
    }

    public function update(Request $request, $id)
    {
        $profil = DB::table('profil')->where('id',$id)->first();

        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if (!empty($profil->foto)) {
                $filePath = public_path('public/profil/' . $profil->foto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Simpan file baru
            $foto = $request->file('foto');
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path('public/profil'), $nama_foto);

            DB::table('profil')  
                ->where('id', $id)
                ->update([
                'tulisan1' => $request->tulisan1,
                'tulisan2' => $request->tulisan2,
                'foto' => $nama_foto
            ]);
        } else {
            DB::table('profil')  
                ->where('id', $id)
                ->update([
                'tulisan1' => $request->tulisan1,
                'tulisan2' => $request->tulisan2,
            ]);
        }

        return redirect('/admin/profil')->with("success","Data Berhasil Diupdate !");
    }

     public function delete($id) {
        $profil= DB::table('profil')->where('id',$id)->first();
        if (!empty($profil->foto)) {
            $filePath = public_path('public/profil/' . $profil->foto);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        DB::table('profil')->where('id',$id)->delete();

        return redirect('admin/profil')->with("success","Data Berhasil Didelete !");
    }
}
