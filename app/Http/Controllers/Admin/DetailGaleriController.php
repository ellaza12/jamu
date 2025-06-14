<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailGaleriController extends Controller
{
     protected $galericontroller;

    public function __construct( GaleriController $galericontroller)
    {
        $this->galericontroller = $galericontroller;
    }

    public function index($id)
    {
        $galeri = $this->galericontroller->find($id);
        return view('landingpage.detailgaleri', compact('galeri'));
    }
}
