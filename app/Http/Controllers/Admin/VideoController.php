<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function read()
    {
        return DB::table('video')->get();

    }

     public function admin()
    {
        $video = DB::table('video')->get();
        return view('admin.video.index', ['video' => $video]);
    }

     public function add()
    {
        return view('admin.video.tambah');
    }

    public function create(Request $request)
    {
        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path() . "/public/video",$nama_foto);

            DB::table('video')->insert([
                'nama' => $request->nama,
                'link_video' => $request->link_video,
                'bg_foto' => $nama_foto
            ]);
        } else {
            DB::table('video')->insert([
                'nama' => $request->nama,
                'link_video' => $request->link_video,
            ]);
        }

        return redirect('admin/video')->with("success", "Data Berhasil Ditambah !");
    }

     public function edit($id)
    {
        $video = DB::table('video')->where('id', $id)->first();
        return view('admin.video.edit', ['video' => $video]);
    }

    public function update(Request $request, $id)
    {
        $video = DB::table('video')->where('id',$id)->first();

        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if (!empty($video->foto)) {
                $filePath = public_path('public/video/' . $video->foto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Simpan file baru
            $foto = $request->file('foto');
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path('public/video'), $nama_foto);

            DB::table('video')  
                ->where('id', $id)
                ->update([
                'nama' => $request->nama,
                'link_video' => $request->link_video,
                'bg_foto' => $nama_foto
            ]);
        } else {
            DB::table('video')  
                ->where('id', $id)
                ->update([
                'nama' => $request->nama,
                'link_video' => $request->link_video,
            ]);
        }

        return redirect('/admin/video')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id) {
        $video= DB::table('video')->where('id',$id)->first();
        if (!empty($video->foto)) {
            $filePath = public_path('public/video/' . $video->foto);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        DB::table('video')->where('id',$id)->delete();

        return redirect('admin/video')->with("success","Data Berhasil Didelete !");
    }
}
