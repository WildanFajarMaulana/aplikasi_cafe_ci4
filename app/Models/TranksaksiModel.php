<?php

namespace App\Models;

use CodeIgniter\Model;

class TranksaksiModel extends Model
{
    protected $table      = 'tb_tranksaksi';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_pembeli','nama_pembeli','total_pembayaran','payment','pengiriman','status_tranksaksi','nama_petugas','show_pemesanan'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
  
    public function cekTranksaksiByIdStatus($id_pembeli,$status_tranksaksi){
        return $this->where(['id_pembeli'=>$id_pembeli,'status_tranksaksi'=>$status_tranksaksi])->first();
    }
     public function cekTranksaksiByIdStatus2($id_pembeli,$status_diproses,$status_konfirmasi){
        $where="id_pembeli='$id_pembeli' AND status_tranksaksi='$status_diproses' OR status_tranksaksi='$status_konfirmasi' ORDER BY id DESC";
        return $this->where($where)->first();
    }
    public function getTranksaksiSelesai($id_pembeli,$status_tranksaksi){
        return $this->where(['id_pembeli'=>$id_pembeli,'status_tranksaksi'=>$status_tranksaksi])->orderBy('id','DESC')->find();
    }
    public function cekTranksaksiById($id_pembeli){
        return $this->where(['id_pembeli'=>$id_pembeli])->orderBy('id','DESC')->first();
    }
    public function sumPesanan($id_pembeli,$status_diproses,$status_konfirmasi){
        $where="id_pembeli='$id_pembeli' AND status_tranksaksi='$status_diproses' OR status_tranksaksi='$status_konfirmasi'";
        $query=$this->getWhere($where);
        return $query->getNumRows($query);
    }
  
 }