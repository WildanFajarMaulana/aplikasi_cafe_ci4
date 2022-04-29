<?php

namespace App\Models;

use CodeIgniter\Model;

class TranksaksiModel extends Model
{
    protected $table      = 'tb_tranksaksi';
    protected $primaryKey = 'id_tranksaksi';

    protected $allowedFields = ['id_pembeli','id_petugas','nama_pembeli','total_pembayaran','payment','pengiriman','status_tranksaksi','nama_petugas','show_pemesanan'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
  
    public function cekTranksaksiByIdStatus($id_pembeli,$status_tranksaksi){
        return $this->where(['id_pembeli'=>$id_pembeli,'status_tranksaksi'=>$status_tranksaksi])->first();
    }
    public function cekTranksaksiByIdStatusPemesanan($id_pembeli,$status_tranksaksi){
        return $this->where(['id_pembeli'=>$id_pembeli,'status_tranksaksi'=>$status_tranksaksi])->first();
    }
     public function cekTranksaksiByIdStatus2($id_pembeli,$status_diproses,$status_konfirmasi){
        $where="id_pembeli='$id_pembeli' AND status_tranksaksi='$status_diproses' OR status_tranksaksi='$status_konfirmasi' ORDER BY id_tranksaksi DESC";
        return $this->where($where)->first();
    }
    public function getTranksaksiSelesai($id_pembeli,$status_tranksaksi){
        return $this->where(['id_pembeli'=>$id_pembeli,'status_tranksaksi'=>$status_tranksaksi])->orderBy('id_tranksaksi','DESC')->find();
    }
    public function getTranksaksiSelesaiChat($id_pembeli,$id_tranksaksi){
        return $this->where(['id_pembeli'=>$id_pembeli,'id_tranksaksi'=>$id_tranksaksi,'status_tranksaksi'=>'selesai'])->first();
    }
    public function cekTranksaksiById($id_pembeli){
        return $this->where(['id_pembeli'=>$id_pembeli])->orderBy('id_tranksaksi','DESC')->first();
    }
    public function sumPesanan($id_pembeli,$status_diproses,$status_konfirmasi){
        $where="id_pembeli='$id_pembeli' AND status_tranksaksi='$status_diproses' OR status_tranksaksi='$status_konfirmasi'";
        $query=$this->getWhere($where);
        return $query->getNumRows($query);
    }
    public function getByStatusPesan(){
        $where="status_tranksaksi !='selesai'";
        return $this->join('tb_profile','tb_profile.id=tb_tranksaksi.id_pembeli')->where($where)->paginate(5,'useraccpesan');  
    }
    public function getRiwayatPesananSelesai(){
        
        return $this->join('tb_profile','tb_profile.id=tb_tranksaksi.id_pembeli')->where(['status_tranksaksi'=>'selesai'])->paginate(10,'userpesanan');  
    }
    public function deletePesanan($id){
        $sql="DELETE FROM tb_tranksaksi WHERE id_tranksaksi='$id'";

        return $this->query($sql);
    }
    public function getTranksaksiTerbaruByIdpembeli($id_pembeli){
        return $this->where(['id_pembeli'=>$id_pembeli])->orderBy('id_tranksaksi','DESC')->first();
    }
  
 }