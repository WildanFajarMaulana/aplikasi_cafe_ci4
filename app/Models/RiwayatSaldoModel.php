<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatSaldoModel extends Model
{
    protected $table      = 'tb_riwayatsaldo';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_pembeli','id_petugas','id_penerima','deskripsi','saldo'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
  
    public function getRiwayatSaldoByIdPembeli($id_pembeli){
        return $this->where(['id_pembeli'=>$id_pembeli])->find();
    }
  
 }