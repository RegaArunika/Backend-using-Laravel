<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        
        // $paket = [
        //     (object)[
        //         'paket_code' => 'Dummy Code',
        //         'paket_name' => 'Nike Court Legacy',
        //         'paket_desc' => 'Menghormati sejarah yang berakar dalam budaya tenis, Nike Court Legacy membawa Anda kehadiran produk yang telah diuji waktu. Bagian atasnya yang berkerut, jahitan warisan, dan desain Swoosh retro memungkinkan Anda menyatukan gaya olahraga dan mode. Dan, Anda bisa berbuat baik dengan terlihat baik.',
        //         'shoes_img' =>'images\shoes1.jpg',

                
        //     ],
        //     (object)[
        //         'paket_code' => 'Dummy Code2',
        //         'paket_name' => 'Puma Velophasis',
        //         'paket_desc' => 'Velophasis mengambil inspirasi dari gaya tahun 2000-an dan rentang performa lari warisan PUMA, diimajinasikan kembali untuk menciptakan sesuatu yang baru dan otentik. Basis jaring terbuka, lapisan sintetis, dan potongan TPU transparan yang dibentuk bergabung untuk menciptakan tampilan teknologi yang dinamis dan menuntut perhatian.',
        //         'shoes_img' =>'images\puma.jpg',
                
        //     ],
        //     (object)[
        //         'paket_code' => 'Dummy Code2',
        //         'paket_name' => 'Adidas Trainer Shoes',
        //         'paket_desc' => '',
        //         'shoes_img' =>'images\adidas.jpg',
                
        //     ]
        // ];
        $title = "Landing Page";
        $produk = produk::all(); 
        return view('frontpage.landingpage', compact('title', 'produk',));
    }

    public function notflix(){
        return view('frontpage.notflix');
    }

    public function keranjang(){
        return view('frontpage.keranjang');
    }

    public function contact() {
        return view('frontpage.contact');
    }

    public function dashboard(){

        return view('frontpage.dashboard', ['tittle' => "Dashboard"]);
    }

    
}
