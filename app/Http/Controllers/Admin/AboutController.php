<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function read()
    {
        return DB::table('about')->get();
    }
     public function admin()
    {
        $about = DB::table('about')->get();
        return view('admin.about.index', ['about' => $about]);
    }

    public function add()
    {
        return view('admin.about.tambah');
    }

    public function create(Request $request)
    {
        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path() . "/public/about",$nama_foto);

            DB::table('about')->insert([
                'keterangan' => $request->keterangan,
                'foto' => $nama_foto
            ]);
        } else {
            DB::table('about')->insert([
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect('admin/about')->with("success", "Data Berhasil Ditambah !");
    }

    public function edit($id)
    {
        $about = DB::table('about')->where('id', $id)->first();
        return view('admin.about.edit', ['about' => $about]);
    }

    public function update(Request $request, $id)
    {
        $about = DB::table('about')->where('id',$id)->first();

        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if (!empty($about->foto)) {
                $filePath = public_path('public/about/' . $about->foto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Simpan file baru
            $foto = $request->file('foto');
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path('public/about'), $nama_foto);

            DB::table('about')  
                ->where('id', $id)
                ->update([
             
                'keterangan' => $request->keterangan,
                'foto' => $nama_foto
            ]);
        } else {
            DB::table('about')  
                ->where('id', $id)
                ->update([
                
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect('/admin/about')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id) {

        $about= DB::table('about')->where('id',$id)->first();
        DB::table('about')->where('id',$id)->delete();

        return redirect('/admin/about')->with("success","Data Berhasil Didelete !");

        
    }

}
