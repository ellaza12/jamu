<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
     public function read()
    {
        return DB::table('blog')->get();

    }

     public function admin()
    {
        $blog = DB::table('blog')->get();
        return view('admin.blog.index', ['blog' => $blog]);
    }

     public function add()
    {
        return view('admin.blog.tambah');
    }

    public function create(Request $request)
    {
        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path() . "/public/blog",$nama_foto);

            DB::table('blog')->insert([
                'nama' => $request->nama,
                'link_blog' => $request->link_blog,
                'bg_foto' => $nama_foto
            ]);
        } else {
            DB::table('blog')->insert([
                'nama' => $request->nama,
                'link_blog' => $request->link_blog,
            ]);
        }

        return redirect('admin/blog')->with("success", "Data Berhasil Ditambah !");
    }

     public function edit($id)
    {
        $blog = DB::table('blog')->where('id', $id)->first();
        return view('admin.blog.edit', ['blog' => $blog]);
    }

  public function update(Request $request, $id)
{
    $blog = DB::table('blog')->where('id', $id)->first();

    if ($request->hasFile('bg_foto')) {
        // Hapus file lama jika ada
        if (!empty($blog->bg_foto)) {
            $filePath = public_path('public/blog/' . $blog->bg_foto);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Simpan file baru
        $foto = $request->file('bg_foto');
        $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
        $foto->move(public_path('public/blog'), $nama_foto);

        DB::table('blog')  
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'link_blog' => $request->link_blog,
                'bg_foto' => $nama_foto
            ]);
    } else {
        // Update tanpa mengubah foto
        DB::table('blog')  
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'link_blog' => $request->link_blog,
                'bg_foto' => $blog->bg_foto // tetap pakai foto lama
            ]);
    }

    return redirect('/admin/blog')->with("success","Data Berhasil Diupdate !");
}



    public function delete($id) {
        $blog= DB::table('blog')->where('id',$id)->first();
        if (!empty($blog->foto)) {
            $filePath = public_path('public/blog/' . $blog->foto);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        DB::table('blog')->where('id',$id)->delete();

        return redirect('admin/blog')->with("success","Data Berhasil Didelete !");
    }   
}
