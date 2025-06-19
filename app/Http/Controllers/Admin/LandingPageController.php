<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    protected $profilcontroller;
    protected $aboutcontroller;
    protected $videocontroller;
    protected $produkcontroller;
    protected $blogcontroller;
    protected $kontakcontroller;
    protected $galericontroller;
    protected $artikelcontroller;

    public function __construct(ProfilController $profilcontroller, AboutController $aboutcontroller, VideoController $videocontroller, ProdukController $produkcontroller, BlogController $blogcontroller, KontakController $kontakcontroller, GaleriController $galericontroller, ArtikelController $artikelcontroller)
    {
        $this->profilcontroller = $profilcontroller;
        $this->aboutcontroller = $aboutcontroller;
        $this->videocontroller = $videocontroller;
        $this->produkcontroller = $produkcontroller;
        $this->blogcontroller = $blogcontroller;
        $this->kontakcontroller = $kontakcontroller;
        $this->galericontroller = $galericontroller;
        $this->artikelcontroller = $artikelcontroller;
    }

    public function index()
    {
        $profil = $this->profilcontroller->read();
        $about = $this->aboutcontroller->read();
        $video = $this->videocontroller->read();
        $produk = $this->produkcontroller->read();
        $blog = $this->blogcontroller->read();
        $kontak = $this->kontakcontroller->read();
        $galeri = $this->galericontroller->read();
        $artikel = $this->artikelcontroller->read();
        return view('landingpage.index', compact('profil','about','video','produk','blog','kontak','galeri','artikel'));
    }

  public function detailproduk($id)
{
    // Tambahkan view +1
    DB::table('produk')->where('id', $id)->increment('view');

    // Ambil data produk lengkap dengan kategori
    $produk = DB::table('produk')
        ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
        ->select('produk.*', 'kategori.nama as nama_kategori')
        ->where('produk.id', $id)
        ->first();

    return view('landingpage.detailproduk', compact('produk'));
}


  public function detailgaleri($id)
{
    // Tambahkan view +1
    DB::table('galeri')->where('id', $id)->increment('view');

    // Ambil data galeri lengkap dengan kategori
    $galeri = DB::table('galeri')
    ->where('id', $id)
    ->first();

    return view('landingpage.detailgaleri', compact('galeri'));
}


}
