<?php

namespace App\Controllers;

class Petugas extends BaseController
{
    public function pesananMasuk()
    {
        $data['title']='Petugas | ManagePesanan';
        $data['css']='index.css';
        return view('petugas/pesananMasuk',$data);
    }

    public function topUp()
    {
        $data['title']='Petugas | TopUp';
        $data['css']='index.css';
        return view('petugas/topUp',$data);
    }
    
    public function riwayatPesanan()
    {
        $data['title']='Petugas | RiwayatPesanan';
        $data['css']='index.css';
        return view('petugas/riwayatPesanan',$data);
    }

    public function riwayatopUp()
    {
        $data['title']='Petugas | RiwayatTopup';
        $data['css']='index.css';
        return view('petugas/riwayatopup',$data);
    }
    
}
