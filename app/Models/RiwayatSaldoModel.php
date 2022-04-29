<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatSaldoModel extends Model
{
    protected $table      = 'tb_riwayatsaldo';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_pembeli','id_petugas','id_penerima','deskripsi','r_saldo'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
  
    public function getRiwayatSaldoByIdPembeli($id_pembeli){
        return $this->where(['id_pembeli'=>$id_pembeli])->find();
    }
    public function getRiwayatSaldoByUser($id_pembeli){
        return $this->where(['id_pembeli'=>$id_pembeli])->orderBy('id','DESC')->find();
    }
    public function getTerimaSaldo($id_pembeli){
        return $this->where(['id_penerima'=>$id_pembeli])->orderBy('id','DESC')->find();
    }
    public function getRiwayatBydeskripsi(){
        return $this->join('tb_profile','tb_profile.id=tb_riwayatsaldo.id_pembeli')->where(['deskripsi'=>'Top Up'])->paginate(10,'usersaldo');  
    
        // return $this->where(['deskripsi'=>'Top Up'])->find();
    }
 }