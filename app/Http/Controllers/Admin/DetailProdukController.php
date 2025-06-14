<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DetailProdukController;

class DetailProdukController extends Controller
{
    protected $produkcontroller;

    public function __construct( ProdukController $produkcontroller)
    {
        $this->produkcontroller = $produkcontroller;
    }

    public function index($id)
    {
        $produk = $this->produkcontroller->find($id);
        return view('landingpage.detailproduk', compact('produk'));
    }
    
}
