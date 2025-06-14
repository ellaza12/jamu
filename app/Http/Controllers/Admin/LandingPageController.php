<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProfilController;

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

}
