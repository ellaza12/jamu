<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
     public function read()
    {
        return DB::table('produk')->get();
    }

    public function find($id)
    {
        return DB::table('produk')
            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
            ->select('produk.*', 'kategori.nama as nama_kategori')
            ->where('produk.id', $id)
            ->first();
    }

    public function admin()
    {
        $produk = DB::table('produk')->get();
        return view('admin.produk.index', ['produk' => $produk]);
    }

    public function add(){
        $kategori = DB::table('kategori')->orderBy('id','DESC')->get();
        return view('admin.produk.tambah',['kategori'=> $kategori]);
    }

    public function create(Request $request)
    {
        $foto = $request->file('foto');
          if ($request->hasFile('foto')) {
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path() . "/public/produk", $nama_foto);

            DB::table('produk')->insert([
                'nama' => $request->nama,
                'id_kategori' => $request->id_kategori,
                'foto' => $nama_foto,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat,
            ]);
        } else {
            DB::table('produk')->insert([
                'nama' => $request->nama,
                'id_kategori' => $request->id_kategori,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat,
            ]);
        }

        return redirect('admin/produk')->with("success", "Data Berhasil Ditambah !");
    }

    public function edit($id)
    {
        $produk = DB::table('produk')->where('id', $id)->first();
        $kategoriSelect = DB::table('kategori')->find($produk->id_kategori);
        $kategoriAll = DB::table('kategori')->where('id', '!=', $kategoriSelect->id)->orderBy('id', 'DESC')->get();
        
        return view('admin.produk.edit', [
            'produk' => $produk,
            'kategoriSelect' => $kategoriSelect,
            'kategoriAll' => $kategoriAll
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $produk = DB::table('produk')->where('id',$id)->first();

        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if (!empty($produk->foto)) {
                $filePath = public_path('public/produk/' . $produk->foto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Simpan file baru
            $foto = $request->file('foto');
            $nama_foto = uniqid().".".$foto->getClientOriginalExtension();
            $foto->move(public_path('public/produk'), $nama_foto);

            DB::table('produk')  
                ->where('id', $id)
                ->update([
                'nama' => $request->nama,
                'id_kategori' => $request->id_kategori,
                'foto' => $nama_foto,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat,
            ]);
        } else {
            DB::table('produk')  
                ->where('id', $id)
                ->update([
                'nama' => $request->nama,
                'id_kategori' => $request->id_kategori,
                'deskripsi' => $request->deskripsi,
                'manfaat' => $request->manfaat,
            ]);
        }

        return redirect('/admin/produk')->with("success","Data Berhasil Diupdate !");
    }


     public function delete($id) {
        $produk= DB::table('produk')->where('id',$id)->first();
        if (!empty($produk->foto)) {
            $filePath = public_path('public/produk/' . $produk->foto);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        DB::table('produk')->where('id',$id)->delete();

        return redirect('admin/produk')->with("success","Data Berhasil Didelete !");
    }
    

}
