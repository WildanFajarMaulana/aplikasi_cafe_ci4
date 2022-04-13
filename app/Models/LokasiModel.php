<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table      = 'tb_lokasi';
    protected $primaryKey = 'id';

    protected $allowedFields = ['lokasi'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
  
    public function getLokasi(){
        return $this->orderBy('id','ASC')->paginate(3);
    }
    public function getLokasiByid($id){
        return $this->where(['id'=>$id])->first();
    }
    public function getLokasiByKeyword($keyword){
       $where="lokasi LIKE '$keyword%'";
       return $this->where($where)->paginate(3);

        
    }
  
 }