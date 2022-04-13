<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangMenuModel extends Model
{
    protected $table      = 'tb_keranjangmenu';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_menu', 'id_pembeli','nama_menu','gambar_menu','jumlah','harga','status','total_harga'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   
    // public function tambahDataToken($data){
    //     $this->table('tb_login_token')->insert($data);
    // }
    // public function getUser($email){
    //   return $this->where(['email'=>$email])->first();
    // }
    // public function getMenuKategori($kategori){
    //     return $this->where(['kategori'=>$kategori])->find();
    // }
    public function cekDataKeranjangByIdPembeliDanIdMenu($id_menu,$id_pembeli){
        return $this->where(['id_menu'=>$id_menu,'id_pembeli'=>$id_pembeli])->first();
    }
    public function getKeranjangJoinByid($id_pembeli){
       
         return $this->join('tb_menu','tb_menu.id=tb_keranjangmenu.id_menu')->where(['id_pembeli'=>$id_pembeli])->get()->getResultArray();  
    }
    public function getKeranjangByIdPembeli($id_pembeli){
          return $this->where(['id_pembeli'=>$id_pembeli])->find();
    }
    public function sumKeranjangByIdPembeli($id_pembeli){
        return $this->selectSum('total_harga')->where(['id_pembeli'=>$id_pembeli])->find();
    }
    public function totalKeranjangById($id_pembeli){
        $query=$this->getWhere(['id_pembeli'=>$id_pembeli]);
        return $query->getNumRows();
    }
    public function deleteMenuKeranjang($id,$id_pembeli){
        $sql="DELETE FROM tb_keranjangmenu WHERE id='$id' AND id_pembeli='$id_pembeli'";
        
        return $this->query($sql);
        // return $this->delete(['id_pembeli'=>$id_pembeli]);
    }

    public function deleteByidPembeli($id_pembeli){
        $sql="DELETE FROM tb_keranjangmenu WHERE id_pembeli='$id_pembeli'";
         return $this->query($sql);
    }
    public function getKeranjangUser($id_pembeli){
        return $this->where(['id_pembeli'=>$id_pembeli,'status'=>'masuk'])->find();
    }
    public function getKeranjangUserByMenu($id_menu,$id_pembeli){
         return $this->where(['id'=>$id_menu,'id_pembeli'=>$id_pembeli])->first();
    }
    // public function hitungTotalKeranjang($id_pembeli){
        
    // }
}